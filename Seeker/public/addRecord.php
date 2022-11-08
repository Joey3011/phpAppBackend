<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/add_content.php';
require_login();
?>
<?php view('header-content', ['title' => 'Add Content']) ?>
<div class="container">
        <div class="row">
            <div class="cols-xs">
                <div id="paginated-list" data-current-page="1" aria-live="polite">  
                <?php flash() ?>
                <?php if (isset($errors['login'])) : ?>
                        <div class="error alert-error">
                            <small><?= $errors['login'] ?></small>
                        </div>  
                <?php endif  ?>
                    <form class="form-menu_issue" action="addRecord" method="post"> 
                        <div class="form-elements_issue">
                            <h5 class="form-htag">Add Main & Sub Issue Content</h5>
                            <div>
                                <label class="form-label" for="Issue">Main ID:</label>
                                <input class="form-input" type="text" name="sub_id" id="sub_id" value="<?= $inputs['sub_id'] ?? '' ?>" placeholder="Type text for ID"  required>
                                <small><?= $errors['sub_id'] ?? '' ?></small>
                            </div>
                            <div>
                                <label class="form-label" for="Issue">Main Issue:</label>
                                <textarea name="issue" rows="1" column="1" id="issue" value="<?= $inputs['issue'] ?? '' ?>" placeholder="Type text for Issue" required></textarea>
                                <small><?= $errors['issue'] ?? '' ?></small>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Intro About the Issue :</label>
                                <textarea name="intro" rows="1" column="1" id="intro" placeholder="Type text for intro about the issue"></textarea>
                            </div>
                        </div>
                        <div class="form-elements_issue">
                            <h5 class="form-htag">Add Sub One Issue TS Content</h5>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue One :</label>
                                <textarea name="main1" rows="1" column="1" id="main1" value="<?= $inputs['main1'] ?? '' ?>"  placeholder="Type text for sub one"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 1 TS one :</label>
                                <textarea name="tsone1" rows="1" column="1" id="tsone1" value="<?= $inputs['tsone1'] ?? '' ?>" placeholder="Type text for sub ts one"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 1 TS two:</label>
                                <textarea name="tstwo1" rows="1" column="1" id="tstwo1" value="<?= $inputs['tstwo1'] ?? '' ?>"  placeholder="Type text for sub ts two"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 1 TS three:</label>
                                <textarea name="tsthree1" rows="1" column="1" id="tsthree1" value="<?= $inputs['tsthree1'] ?? '' ?>" placeholder="Type text for sub ts three" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 1 TS four:</label>
                                <textarea name="tsfour1" rows="1" column="1" id="tsfour1" value="<?= $inputs['tsfour1'] ?? '' ?>" placeholder="Type text for sub ts four" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 1 TS five:</label>
                                <textarea name="tsfive1" rows="1" column="1" id="tsfive1" value="<?= $inputs['tsfive1'] ?? '' ?>" placeholder="Type text for sub ts five"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 1 TS Six:</label>
                                <textarea name="tssix1" rows="1" column="1" id="tssix1" value="<?= $inputs['tssix1'] ?? '' ?>" placeholder="Type text for sub ts six" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 1 TS Seven:</label>
                                <textarea name="tsseven1" rows="1" column="1" id="tsseven1" value="<?= $inputs['tsseven1'] ?? '' ?>" placeholder="Type text for sub ts seven"></textarea>
                            </div>                            
                        </div>
                        <div class="form-elements_issue">
                            <h5 class="form-htag">Add Sub Two Issue TS Content</h5>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue Two :</label>
                                <textarea name="main2" rows="1" column="1" id="main2" value="<?= $inputs['main2'] ?? '' ?>"  placeholder="Type text for sub two"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 2 TS one :</label>
                                <textarea name="tsone2" rows="1" column="1" id="tsone2"  value="<?= $inputs['tsone2'] ?? '' ?>"  placeholder="Type text for sub ts one"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 2 TS two:</label>
                                <textarea name="tstwo2" rows="1" column="1" id="tstwo2"   value="<?= $inputs['tstwo2'] ?? '' ?>"  placeholder="Type text for sub ts two"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 2 TS three:</label>
                                <textarea name="tsthree2" rows="1" column="1" id="tsthree2"  value="<?= $inputs['tsthree2'] ?? '' ?>"  placeholder="Type text for sub ts three" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 2 TS four:</label>
                                <textarea name="tsfour2" rows="1" column="1" id="tsfour2"  value="<?= $inputs['tsfour2'] ?? '' ?>"  placeholder="Type text for sub ts four" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 2 TS five:</label>
                                <textarea name="tsfive2" rows="1" column="1" id="tsfive2"  value="<?= $inputs['tsfive2'] ?? '' ?>"  placeholder="Type text for sub ts five"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 2 TS Six:</label>
                                <textarea name="tssix2" rows="1" column="1" id="tssix2"  value="<?= $inputs['tssix2'] ?? '' ?>"  placeholder="Type text for sub ts six" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 2 TS Seven:</label>
                                <textarea name="tsseven2" rows="1" column="1" id="tsseven2"  value="<?= $inputs['tsseven2'] ?? '' ?>"  placeholder="Type text for sub ts seven"></textarea>
                            </div> 
                        </div>
                        <div class="form-elements_issue">
                            <h5 class="form-htag">Add Sub Three Issue TS Content</h5>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue Three :</label>
                                <textarea name="main3" rows="1" column="1" id="main3"   value="<?= $inputs['main3'] ?? '' ?>"  placeholder="Type text for sub three"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 3 TS one :</label>
                                <textarea name="tsone3" rows="1" column="1" id="tsone3"   value="<?= $inputs['tsone3'] ?? '' ?>"  placeholder="Type text for sub ts one"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 3 TS two:</label>
                                <textarea name="tstwo3" rows="1" column="1" id="tstwo3"    value="<?= $inputs['tstwo3'] ?? '' ?>"  placeholder="Type text for sub ts two"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 3 TS three:</label>
                                <textarea name="tsthree3" rows="1" column="1" id="tsthree3"   value="<?= $inputs['tsthree3'] ?? '' ?>"  placeholder="Type text for sub ts three" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 3 TS four:</label>
                                <textarea name="tsfour3" rows="1" column="1" id="tsfour3"   value="<?= $inputs['tsfour3'] ?? '' ?>"  placeholder="Type text for sub ts four" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 3 TS five:</label>
                                <textarea name="tsfive3" rows="1" column="1" id="tsfive3"   value="<?= $inputs['tsfive3'] ?? '' ?>"  placeholder="Type text for sub ts five"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 3 TS Six:</label>
                                <textarea name="tssix3" rows="1" column="1" id="tssix3"   value="<?= $inputs['tssix3'] ?? '' ?>"  placeholder="Type text for sub ts six" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 3 TS Seven:</label>
                                <textarea name="tsseven3" rows="1" column="1" id="tsseven3"   value="<?= $inputs['tsseven2'] ?? '' ?>"  placeholder="Type text for sub ts seven"></textarea>
                            </div> 
                        </div>
                        <div class="form-elements_issue">
                            <h5 class="form-htag">Add Sub Four Issue TS Content</h5>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue Four :</label>
                                <textarea name="main4" rows="1" column="1" id="main4" value="<?= $inputs['main4'] ?? '' ?>" placeholder="Type text for sub four"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue Issue 4 TS one :</label>
                                <textarea name="tsone4" rows="1" column="1" id="tsone4" value="<?= $inputs['tsone4'] ?? '' ?>" placeholder="Type text for sub ts one"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue Issue 4 TS two:</label>
                                <textarea name="tstwo4" rows="1" column="1" id="tstwo4"  value="<?= $inputs['tstwo4'] ?? '' ?>" placeholder="Type text for sub ts two"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue Issue 4 TSthree:</label>
                                <textarea name="tsthree4" rows="1" column="1" id="tsthree4" value="<?= $inputs['tsthree4'] ?? '' ?>" placeholder="Type text for sub ts three" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue Issue 4 TS four:</label>
                                <textarea name="tsfour4" rows="1" column="1" id="tsfour4" value="<?= $inputs['tsfour4'] ?? '' ?>" placeholder="Type text for sub ts four" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 4 TS five:</label>
                                <textarea name="tsfive4" rows="1" column="1" id="tsfive4" value="<?= $inputs['tsfive4'] ?? '' ?>" placeholder="Type text for sub ts five"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 4 TS Six:</label>
                                <textarea name="tssix4" rows="1" column="1" id="tssix4" value="<?= $inputs['tssix4'] ?? '' ?>" placeholder="Type text for sub ts six" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 4 TS Seven:</label>
                                <textarea name="tsseven4" rows="1" column="1" id="tsseven4" value="<?= $inputs['tsseven4'] ?? '' ?>" placeholder="Type text for sub ts seven"></textarea>
                            </div> 
                        </div>
                        <div class="form-elements_issue">
                            <h5 class="form-htag">Add Sub Five Issue TS Content</h5>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue Five :</label>
                                <textarea name="main5" rows="1" column="1" id="main5"  value="<?= $inputs['main5'] ?? '' ?>" placeholder="Type text for sub five"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 5 TS one :</label>
                                <textarea name="tsone5" rows="1" column="1" id="tsone5" value="<?= $inputs['tsone5'] ?? '' ?>" placeholder="Type text for sub ts one"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 5 TStwo:</label>
                                <textarea name="tstwo5" rows="1" column="1" id="tstwo5" value="<?= $inputs['tstwo5'] ?? '' ?>" placeholder="Type text for sub ts two"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 5 TS three:</label>
                                <textarea name="tsthree5" rows="1" column="1" id="tsthree5" value="<?= $inputs['tsthree5'] ?? '' ?>" placeholder="Type text for sub ts three" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 5 TS four:</label>
                                <textarea name="tsfour5" rows="1" column="1" id="tsfour5" value="<?= $inputs['tsfour5'] ?? '' ?>" placeholder="Type text for sub ts four" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 5 TS five:</label>
                                <textarea name="tsfive5" rows="1" column="1" id="tsfive5" value="<?= $inputs['tsfive5'] ?? '' ?>" placeholder="Type text for sub ts five"></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 5 TS Six:</label>
                                <textarea name="tssix5" rows="1" column="1" id="tssix5" value="<?= $inputs['tssix5'] ?? '' ?>" placeholder="Type text for sub ts six" ></textarea>
                            </div>
                            <div>
                                <label class="form-label" for="sub-issue">Sub Issue 5 TS Seven:</label>
                                <textarea name="tsseven5" rows="1" column="1" id="tsseven5" value="<?= $inputs['tsseven5'] ?? '' ?>" placeholder="Type text for sub ts seven"></textarea>
                            </div> 
                        </div>
                        <div class="form-element_issue">
                            <button  class="btn btn-primary btn-sm" style="float: right;" type="submit" title="Submit" id="butSubmit">Submit Record</button> 
                            
                <div  class="btn btn-primary btn-sm" style="float: right;" title="Review and Submit" id="butRev">Review and Submit</div>
                
                <div  class="btn btn-primary btn-sm" title="Cancel" style="float: left;" id="butCan">Cancel</div>
                        </div>
                        </div> 
                    </form><br/>  
                    <div class="pagination-container">
                        <button class="pagination-button" id="prev-button" aria-label="Previous Page" title="Previous Page"><i class='fa fa-caret-left'></i></button>
                        <div id="pagination-numbers"></div>
                        <button class="pagination-button" id="next-button" aria-label="Next Page" title="Next Page"><i class='fa fa-caret-right'></i></button>
                    </div><br />
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="/../DiYer/Seeker/js/jquery.min.js"></script>   
<script type="text/javascript" src="/../DiYer/Seeker/js/page.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#butRev').click(function(){
        $('#butRev').css("display","none");
        $('.form-elements_issue').css("display","block");
        $('#butSubmit').css("display","block");
        $('.pagination-container').css("display","none");
    });
    
 $('#butCan').click(function(){
     location.reload();
    });
});
</script> 
<?php view('footer-content') ?>