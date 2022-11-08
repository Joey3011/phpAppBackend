<?php
$errors = [];
$inputs = [];

if (is_post_request()) {
    $fields = [
        'sub_id' => 'string',
        'issue' => 'string',
        'intro' => 'string', 

        'main1' => 'string',
        'tsone1' => 'string ', 
        'tstwo1' => 'string ', 
        'tsthree1' => 'string ', 
        'tsfour1' => 'string ', 
        'tsfive1' => 'string ', 
        'tssix1' => 'string ', 
        'tsseven1' => 'string',

        'main2' => 'string',
        'tsone2' => 'string ', 
        'tstwo2' => 'string ', 
        'tsthree2' => 'string ', 
        'tsfour2' => 'string ', 
        'tsfive2' => 'string ', 
        'tssix2' => 'string ', 
        'tsseven2' => 'string',

        'main3' => 'string',
        'tsone3' => 'string ', 
        'tstwo3' => 'string ', 
        'tsthree3' => 'string ', 
        'tsfour3' => 'string ', 
        'tsfive3' => 'string ', 
        'tssix3' => 'string ', 
        'tsseven3' => 'string',

        'main4' => 'string',
        'tsone4' => 'string ', 
        'tstwo4' => 'string ', 
        'tsthree4' => 'string ', 
        'tsfour4' => 'string ', 
        'tsfive4' => 'string ', 
        'tssix4' => 'string ', 
        'tsseven4' => 'string',

        'main5' => 'string',
        'tsone5' => 'string ', 
        'tstwo5' => 'string ', 
        'tsthree5' => 'string ', 
        'tsfour5' => 'string ', 
        'tsfive5' => 'string ', 
        'tssix5' => 'string ', 
        'tsseven5' => 'string',
    ];

    [$inputs, $errors] = filter($_POST, $fields);

    if ($errors) {
        redirect_with('addRecord', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }

    if (add_main($inputs['sub_id'], $inputs['issue'], $inputs['intro']) && 
    add_one($inputs['sub_id'], $inputs['main1'], $inputs['tsone1'], $inputs['tstwo1'], $inputs['tsthree1'], 
    $inputs['tsfour1'], $inputs['tsfive1'], $inputs['tssix1'], $inputs['tsseven1']) && 
    add_two($inputs['sub_id'], $inputs['main2'], $inputs['tsone2'], $inputs['tstwo2'], $inputs['tsthree2'], 
    $inputs['tsfour2'], $inputs['tsfive2'], $inputs['tssix2'], $inputs['tsseven2']) && 
    add_three($inputs['sub_id'], $inputs['main3'], $inputs['tsone3'], $inputs['tstwo3'], $inputs['tsthree3'], 
    $inputs['tsfour3'], $inputs['tsfive3'], $inputs['tssix3'], $inputs['tsseven3']) &&
    add_four($inputs['sub_id'], $inputs['main4'], $inputs['tsone4'], $inputs['tstwo4'], $inputs['tsthree4'], 
    $inputs['tsfour4'], $inputs['tsfive4'], $inputs['tssix4'], $inputs['tsseven4']) &&
    add_five($inputs['sub_id'], $inputs['main5'], $inputs['tsone5'], $inputs['tstwo5'], $inputs['tsthree5'], 
    $inputs['tsfour5'], $inputs['tsfive5'], $inputs['tssix5'], $inputs['tsseven5'])) {
            redirect_with_message(
                'addRecord',
                'Contents successfuly save'
            );
    }else{
        $errors['addRecord'] = 'An error occured while adding record!1';
        redirect_with('addRecord', ['errors' => $errors,'inputs' => $inputs]);
    }

}else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}