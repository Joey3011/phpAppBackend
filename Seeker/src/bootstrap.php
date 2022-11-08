<?php

session_start();
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/libs/helpers.php';
require_once __DIR__ . '/libs/flash.php';
require_once __DIR__ . '/libs/sanitization.php';
require_once __DIR__ . '/libs/validation.php';
require_once __DIR__ . '/libs/filter.php';
require_once __DIR__ . '/libs/connection.php';
require_once __DIR__ . '/reauth.php';

function generate_token_code(): string
{
    return bin2hex(random_bytes(16));
}

function send_activation_email(string $email, string $token_code): void
{
    // create the activation link
    $activation_link = APP_URL . "/activate?email=$email&token_code=$token_code";
    // set email subject & body
    $subject = 'Signup | Verification';
    $from = 'no-reply@email.com';
 
        // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
 
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<p style="color:#000;" font-size:12px;>Thank you for signing up</p>';
    $message .= '<p style="color:#000;font-size:12px;">Your account has been created, you can login using the username and password you have registered after you activated your account.</p>';
        $message .= '<p style="color:#000;font-size:12px;">If you did not initiate this action please disregard it.</p>';
    $message .= '<p style="color:#000;font-size:12px;">Please click the link below to activate your account:</p>';
    $message .= '<a href="' .$activation_link. '" style="color: royalblue;font-size:12px;;">Your Account Activation Link</a>';
    $message .= '</body></html>';  
    // send the email
    mail($email, $subject, $message, $headers);
}

function send_reset_password_email(string $email, string $token_code): void
{
    // create the activation link
    $password_link = APP_URL . "/update_password?email=$email&token_code=$token_code";
    // set email subject & body
    $subject = 'Reset Password Request';
    $from = 'no-reply@email.com';
 
        // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
 
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<p style="color:#000;" font-size:12px;>Hi!</p>';
    $message .= '<p style="color:#000;font-size:12px;">You have requested a reset password to your account.</p>';
    $message .= '<p style="color:#000;font-size:12px;">Please login to your account and reset your password.</p>';
    $message .= '<p style="color:#000;font-size:12px;">Kindly disregard this email if you did not request for this action.</p><br />';
    $message .= '<p style="color:#000;font-size:12px;">Please click the link below to reset your password:</p>';
    $message .= '<a href="' .$password_link. '" style="color: royalblue;font-size:12px;;">Your Reset Password Link</a>';
    $message .= '</body></html>';  
    // send the email
    mail($email, $subject, $message, $headers);
}

function delete_user_by_id(string $id, int $active = 0){
    $sql = 'DELETE FROM users
            WHERE id =:id and active=:active';
    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->bindValue(':active', $active, PDO::PARAM_INT);
    return $statement->execute();
}  

function find_unverified_user(string $token_code, string $email)
{
    $sql = 'SELECT *
            FROM users
            WHERE email=:email AND active=0'; 
    $statement = db()->prepare($sql);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
   if($user && $user['token_code_expiry'] < date('Y-m-d H:i:s', time())){ 
        delete_user_by_id($user['id']);
        return null;
    }else if($user && password_verify($token_code, $user['token_code'])){
        return $user;
  }else{
      return null;
  }
}

function activate_user(int $user_id)
{
    $timeStamp = date('Y-m-d H:i:s',  time());
    $sql = 'UPDATE users
            SET active = 1,
                token_code_expiry = :timeExpire,
                updated_on = :timeUpdate,
                reason = "account activation"
            WHERE id=:id';
    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $user_id, PDO::PARAM_INT);
    $statement->bindValue(':timeExpire', $timeStamp);
    $statement->bindValue(':timeUpdate', $timeStamp);
    return $statement->execute();
}

function verify_pwd_link(string $email, string $token_code)
{
    $sql = 'SELECT *
            FROM users
            WHERE email=:email AND active=1';           
    $statement = db()->prepare($sql);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if($user && $user['token_code_expiry'] < date('Y-m-d H:i:s', time())){ 
        return null;
    }else if($user && password_verify($token_code, $user['token_code'])){
        return $user;
  }else{
      return null;
  }
}

function update_pwd(string $email, string $password):bool{
    $timeStamp = date('Y-m-d H:i:s',  time());
    $sql = 'UPDATE users
        SET pasword = :pasword,
        token_code_expiry = :timeExpire,
        updated_on = :timeUpdate,
        reason = "password updated"
        WHERE email=:email';

        $statement = db()->prepare($sql);

        $statement->bindValue(':email', $email);
        $statement->bindValue(':pasword', password_hash($password, PASSWORD_BCRYPT));
        $statement->bindValue(':timeExpire', $timeStamp);
        $statement->bindValue(':timeUpdate', $timeStamp);
        return $statement->execute();
}

function add_main(string $id, string $issue, string  $intro):bool
{
    $sql = 'INSERT INTO ts_issue(sub_id, issue, intro)
    VALUES(:id, :issue, :intro)';

    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':issue', $issue);
    $statement->bindValue(':intro', $intro);
    $result = $statement->execute();
    if($result){
        return true;
    }else{
        return false;
    }
}
function add_one(string $id, string $main1, string $issue1, string $issue2, string $issue3, string $issue4, string $issue5, string $issue6, string $issue7):bool{
    $sql = 'INSERT INTO ts_sub_one(sub_id, main_sub_one, sub_one1, sub_two1, sub_three1, sub_four1, sub_five1, sub_six1, sub_seven1)
    VALUES(:id, :mainsub1, :issue1, :issue2, :issue3, :issue4, :issue5, :issue6, :issue7)';
    $statement = db()->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':mainsub1', $main1);
        $statement->bindValue(':issue1', $issue1);
        $statement->bindValue(':issue2', $issue2);
        $statement->bindValue(':issue3', $issue3);
        $statement->bindValue(':issue4', $issue4);
        $statement->bindValue(':issue5', $issue5);
        $statement->bindValue(':issue6', $issue6);
        $statement->bindValue(':issue7', $issue7);
        $result =  $statement->execute();
    if($result){
        return true;
    }else{
        return false; 
    }
}
function add_two(string $id, string $main2, string $issue1, string $issue2, string $issue3, string $issue4, string $issue5, string $issue6, string $issue7):bool{
    $sql = 'INSERT INTO ts_sub_two(sub_id, main_sub_two, sub_one2, sub_two2, sub_three2, sub_four2, sub_five2, sub_six2, sub_seven2)
    VALUES(:id, :mainsub2, :issue1, :issue2, :issue3, :issue4, :issue5, :issue6, :issue7)';
    $statement = db()->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':mainsub2', $main2);
        $statement->bindValue(':issue1', $issue1);
        $statement->bindValue(':issue2', $issue2);
        $statement->bindValue(':issue3', $issue3);
        $statement->bindValue(':issue4', $issue4);
        $statement->bindValue(':issue5', $issue5);
        $statement->bindValue(':issue6', $issue6);
        $statement->bindValue(':issue7', $issue7);
        $result =  $statement->execute();
        if($result){
        return true;
    }else{
        return false; 
    }
}
function add_three(string $id, string $main3, string $issue1, string $issue2, string $issue3, string $issue4, string $issue5, string $issue6, string $issue7):bool{
    $sql = 'INSERT INTO ts_sub_three(sub_id, main_sub_three, sub_one3, sub_two3, sub_three3, sub_four3, sub_five3, sub_six3, sub_seven3)
    VALUES(:id, :mainsub3, :issue1, :issue2, :issue3, :issue4, :issue5, :issue6, :issue7)';
    $statement = db()->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':mainsub3', $main3);
        $statement->bindValue(':issue1', $issue1);
        $statement->bindValue(':issue2', $issue2);
        $statement->bindValue(':issue3', $issue3);
        $statement->bindValue(':issue4', $issue4);
        $statement->bindValue(':issue5', $issue5);
        $statement->bindValue(':issue6', $issue6);
        $statement->bindValue(':issue7', $issue7);
        $result =  $statement->execute();
        if($result){
        return true;
    }else{
        return false; 
    }
}
function add_four(string $id, string $main4, string $issue1, string $issue2, string $issue3, string $issue4, string $issue5, string $issue6, string $issue7):bool{
    $sql = 'INSERT INTO ts_sub_four(sub_id, main_sub_four,  sub_one4, sub_two4, sub_three4, sub_four4, sub_five4, sub_six4, sub_seven4)
    VALUES(:id, :mainsub4, :issue1, :issue2, :issue3, :issue4, :issue5, :issue6, :issue7)';
    $statement = db()->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':mainsub4', $main4);
        $statement->bindValue(':issue1', $issue1);
        $statement->bindValue(':issue2', $issue2);
        $statement->bindValue(':issue3', $issue3);
        $statement->bindValue(':issue4', $issue4);
        $statement->bindValue(':issue5', $issue5);
        $statement->bindValue(':issue6', $issue6);
        $statement->bindValue(':issue7', $issue7);
        $result =  $statement->execute();
        if($result){
        return true;
    }else{
        return false; 
    }
}
function add_five(string $id, string $main5, string $issue1, string $issue2, string $issue3, string $issue4, string $issue5, string $issue6, string $issue7):bool{
    $sql = 'INSERT INTO ts_sub_five(sub_id, main_sub_five,  sub_one5, sub_two5, sub_three5, sub_four5, sub_five5, sub_six5, sub_seven5)
    VALUES(:id, :mainsub5, :issue1, :issue2, :issue3, :issue4, :issue5, :issue6, :issue7)';

    $statement = db()->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':mainsub5', $main5);
        $statement->bindValue(':issue1', $issue1);
        $statement->bindValue(':issue2', $issue2);
        $statement->bindValue(':issue3', $issue3);
        $statement->bindValue(':issue4', $issue4);
        $statement->bindValue(':issue5', $issue5);
        $statement->bindValue(':issue6', $issue6);
        $statement->bindValue(':issue7', $issue7);
        $result =  $statement->execute();
        if($result){
        return true;
    }else{
        return false; 
    }
}
