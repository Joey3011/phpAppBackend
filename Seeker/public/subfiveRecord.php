<?php
require __DIR__ . '/../src/bootstrap.php';
require_login();
?>
<?php view('header-content', ['title' => 'Sub Four Record']) ?>
<span class="main-container"> 
    <div class="container">
        <div class="row">
            <div class="cols-xs-1">
                <input class="form-input mainholder" type="text" name="searchbar" id="subfiveSearch" placeholder="Search..." autocomplete="off">
                    <div class="col-md-12" style="color: royalblue; font-size: 19px; font-weight: 600; border-bottom: 2px solid royalblue">
                        <i class="fa fa-address-book" aria-hidden="true">&nbsp; Sub Five Record</i>
                    </div>
                <div class="table-responsive" id="table-responsive5"><br /></div>
            </div>
        </div>
    </div>
         <!--Modal Update--> 
    <div class="modal" id="updateFive" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="color: #fff; background: royalblue; padding: 6px;">
                     <h5 class="modal-title"><i class="fa fa-edit"></i>Update</h5>
                     <i class="fa fa-close closefive1" aria-hidden="true" style="color: #fff; font-size: 20px;"></i>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
                        <div class="col-md-12">
                            <lable class="form-label">Sub ID</lable>
                            <div>
                                <input type="text" readonly="true" name="subid_modal" id="subid_modal" class="form-control-sm">
                            </div>
                        </div>
                        <div  class="col-md-12">
                            <lable class="form-label">Sub Issue Five</lable>
                            <div>
                                <textarea name="subissue_modal" id="subissue_modal" class="form-input" placeholder="Sub Issue five"></textarea>
                            </div>
                        </div>
                        <div  class="col-md-12">
                            <lable class="form-label">TS One</lable>
                            <div>
                                <textarea name="tsone_modal" id="tsone_modal" class="form-input" placeholder="TS one"></textarea>
                            </div>
                        </div>
                        <div  class="col-md-12">
                            <lable class="form-label">TS Two</lable>
                            <div >
                                <textarea name="tstwo_modal" id="tstwo_modal" class="form-input" placeholder="TS two"></textarea>
                            </div>
                        </div>
                        <div  class="col-md-12">
                            <lable class="form-label">TS Three</lable>
                            <div>
                                <textarea name="tsthree_modal" id="tsthree_modal" class="form-input" placeholder="TS three"></textarea>
                            </div>
                        </div>
                        <div  class="col-md-12">
                            <lable class="form-label">TS Four</lable>
                            <div>
                                <textarea name="tsfour_modal" id="tsfour_modal" class="form-input" placeholder="TS four"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <lable class="form-label">TS Five</lable>
                            <div>
                                <textarea name="tsfive_modal" id="tsfive_modal" class="form-input" placeholder="TS five"></textarea>
                            </div>
                        </div>
                        <div  class="col-md-12">
                            <lable class="form-label">TS Six</lable>
                            <div>
                                <textarea name="tssix_modal" id="tssix_modal" class="form-input" placeholder="TS six"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <lable class="form-label">TS Seven</lable>
                            <div>
                                <textarea name="tsseven_modal" id="tsseven_modal" class="form-input" placeholder="TS seven"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding-bottom: 0px !important; text-align: center !important;">
                            <p style="text-align: center; float: center;">
                                <button type="submit" id="update_data_five" class="btn btn-default btn-sm" style="background: royalblue; color: #fff;">Update</button>
                                <button type="button" class="btn btn-default btn-sm exitFive1" aria-label="close" style="background:royalblue; color: #fff;">Close</button>
                             </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <script type="text/javascript">
        $(document).ready(function(){
    //fetch
    $("#subfiveSearch").keyup(function(){
        var input = $(this).val();
        if(input != ""){
            $.ajax({
                url: "/../DiYer/Seeker/public_src_select/selectFive",
                method: "POST",
                data: {input: input},
                success: function(data){
                    $('#table-responsive5').html(data);
                }
            });
        }else{
            fetch_data_sub_five();
        }
    });
    function fetch_data_sub_five(){
    $.ajax({
        url: "/../DiYer/Seeker/public_src_fetch/fetchFive",
        method: "POST",
        success: function(data){
            $('#table-responsive5').html(data);
        }
    });
}
fetch_data_sub_five();
 //update
 $(document).on('click','.update_Five', function(e){
    $('#updateFive').modal().show();
            $('#updateFive').find('#id_modal').val($(this).data('id'));
            $('#updateFive').find('#subid_modal').val($(this).data('subid'));
            $('#updateFive').find('#subissue_modal').val($(this).data('sub1'));
            $('#updateFive').find('#tsone_modal').val($(this).data('ts1'));
            $('#updateFive').find('#tstwo_modal').val($(this).data('ts2'));
            $('#updateFive').find('#tsthree_modal').val($(this).data('ts3'));
            $('#updateFive').find('#tsfour_modal').val($(this).data('ts4'));
            $('#updateFive').find('#tsfive_modal').val($(this).data('ts5'));
            $('#updateFive').find('#tsfsix_modal').val($(this).data('ts6'));
            $('#updateFive').find('#tsseven_modal').val($(this).data('ts7'));

          $('#update_data_five').click(function(){
            if(confirm("Continue to update record?")){
            $.ajax({
                url: "/../DiYer/Seeker/updateFive",
                method: "POST",
                data: {
                    id: $('#updateFive').find('#id_modal').val(),
                subid: $('#updateFive').find('#subid_modal').val(),
                 sub1:  $('#updateFive').find('#subissue_modal').val(),
                 ts1:  $('#updateFive').find('#tsone_modal').val(),
                 ts2:  $('#updateFive').find('#tstwo_modal').val(),
                 ts3:  $('#updateFive').find('#tsthree_modal').val(),
                 ts4:  $('#updateFive').find('#tsfour_modal').val(),
                 ts5:  $('#updateFive').find('#tsfive_modal').val(),
                 ts6:  $('#updateFive').find('#tsfsix_modal').val(),
                 ts7:  $('#updateFive').find('#tsseven_modal').val(),
                },
                cache: false,
                success: function(data){
                var dataResult = JSON.parse(data);
            if(dataResult.statusCode == 200){  
                 $('#updateFive').find('input:text').val('');
                 $('#updateFive').find('textarea').val('');
                 $('#updateFive').modal().hide();
                 fetch_data_sub_five()
                alert("Data for sub5 content successfully updated!");
                location.reload();
             }
             }
          });
        }else{
            location.reload(); 
        }
    });
    $('.exitFive1').click(function(){
        $('#updateFive').modal().hide();
        location.reload();
    });
    $('.closefive1').click(function(){
        $('#updateFive').modal().hide();
        location.reload();
    });
 });
 // DELETE FIVE
$(document).on('click', '#del_five', function(){
     var id = $(this).data("id");
         if(id != ""){
                if(confirm("Continue to remove the record")){
                    $.ajax({
                        url: "/../DiYer/Seeker/remFive",
                        method: "POST",
                        data: {id: id},
                        success: function(data){
                            var dataResult = JSON.parse(data);
                         if(dataResult.statusCode == 200){
                            fetch_data_sub_five();
                            alert("Record successfuly deleted!");
                        }
                        }
                    });
                }
            }
        }); 
});
    </script>        
</span>
<?php view('footer-content') ?>  