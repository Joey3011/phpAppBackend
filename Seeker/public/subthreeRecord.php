<?php
require __DIR__ . '/../src/bootstrap.php';
require_login();
?>
<?php view('header-content', ['title' => 'Sub Three Record']) ?>
<span class="main-container"> 
    <div class="container">
        <div class="row">
            <div class="cols-xs-1">
                <input class="form-input mainholder" type="text" name="searchbar" id="subthreeSearch" placeholder="Search..." autocomplete="off">
                    <div class="col-md-12" style="color: royalblue; font-size: 19px; font-weight: 600; border-bottom: 2px solid royalblue">
                        <i class="fa fa-address-book" aria-hidden="true">&nbsp; Sub Three Record</i>
                    </div>
                <div class="table-responsive" id="table-responsive3"><br /></div>
            </div>
        </div>
    </div>
         <!--Modal Update--> 
    <div class="modal" id="updateThree" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="color: #fff; background: royalblue; padding: 6px;">
                     <h5 class="modal-title"><i class="fa fa-edit"></i>Update</h5>
                     <i class="fa fa-close closethree1" aria-hidden="true" style="color: #fff; font-size: 20px;"></i>
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
                            <lable class="form-label">Sub Issue One</lable>
                            <div>
                                <textarea name="subissue_modal" id="subissue_modal" class="form-control-sm" placeholder="Sub Issue three"></textarea>
                            </div>
                        </div>
                        <div  class="col-md-12">
                            <lable class="form-label">TS One</lable>
                            <div>
                                <textarea name="tsone_modal" id="tsone_modal" class="form-control-sm" placeholder="TS one"></textarea>
                            </div>
                        </div>
                        <div  class="col-md-12">
                            <lable class="form-label">TS Two</lable>
                            <div >
                                <textarea name="tstwo_modal" id="tstwo_modal" class="form-control-sm" placeholder="TS two"></textarea>
                            </div>
                        </div>
                        <div  class="col-md-12">
                            <lable class="form-label">TS Three</lable>
                            <div>
                                <textarea name="tsthree_modal" id="tsthree_modal" class="form-control-sm" placeholder="TS three"></textarea>
                            </div>
                        </div>
                        <div  class="col-md-12">
                            <lable class="form-label">TS Four</lable>
                            <div>
                                <textarea name="tsfour_modal" id="tsfour_modal" class="form-control-sm" placeholder="TS four"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <lable class="form-label">TS Five</lable>
                            <div>
                                <textarea name="tsfive_modal" id="tsfive_modal" class="form-control-sm" placeholder="TS five"></textarea>
                            </div>
                        </div>
                        <div  class="col-md-12">
                            <lable class="form-label">TS Six</lable>
                            <div>
                                <textarea name="tssix_modal" id="tssix_modal" class="form-control-sm" placeholder="TS six"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <lable class="form-label">TS Seven</lable>
                            <div>
                                <textarea name="tsseven_modal" id="tsseven_modal" class="form-control-sm" placeholder="TS seven"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding-bottom: 0px !important; text-align: center !important;">
                            <p style="text-align: center; float: center;">
                                <button type="submit" id="update_data_three" class="btn btn-default btn-sm" style="background: royalblue; color: #fff;">Update</button>
                                <button type="button" class="btn btn-default btn-sm exitThree1" aria-label="close" style="background:royalblue; color: #fff;">Close</button>
                             </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
// fetch
$("#subthreeSearch").keyup(function(){
    var input = $(this).val();
    if(input != ""){
        $.ajax({
            url: "/../DiYer/Seeker/public_src_select/selectThree",
            method: "POST",
            data: {input: input},
            success: function(data){
                $('#table-responsive3').html(data);
            }
        });
    }else{
        fetch_data_sub_three();
    }
});
function fetch_data_sub_three(){
$.ajax({
    url: "/../DiYer/Seeker/public_src_fetch/fetchThree",
    method: "POST",
    success: function(data){
        $('#table-responsive3').html(data);
    }
});
}
fetch_data_sub_three();
 //update 
 $(document).on('click','.update_Three', function(e){
    $('#updateThree').modal().show();
            $('#updateThree').find('#id_modal').val($(this).data('id'));
            $('#updateThree').find('#subid_modal').val($(this).data('subid'));
            $('#updateThree').find('#subissue_modal').val($(this).data('sub1'));
            $('#updateThree').find('#tsone_modal').val($(this).data('ts1'));
            $('#updateThree').find('#tstwo_modal').val($(this).data('ts2'));
            $('#updateThree').find('#tsthree_modal').val($(this).data('ts3'));
            $('#updateThree').find('#tsfour_modal').val($(this).data('ts4'));
            $('#updateThree').find('#tsfive_modal').val($(this).data('ts5'));
            $('#updateThree').find('#tssix_modal').val($(this).data('ts6'));
            $('#updateThree').find('#tsseven_modal').val($(this).data('ts7'));

          $('#update_data_three').click(function(){
            if(confirm("Continue to update record?")){
            $.ajax({
                url: "/../DiYer/Seeker/updateThree",
                method: "POST",
                data: {
                    id: $('#updateThree').find('#id_modal').val(),
                subid: $('#updateThree').find('#subid_modal').val(),
                 sub1:  $('#updateThree').find('#subissue_modal').val(),
                 ts1:  $('#updateThree').find('#tsone_modal').val(),
                 ts2:  $('#updateThree').find('#tstwo_modal').val(),
                 ts3:  $('#updateThree').find('#tsthree_modal').val(),
                 ts4:  $('#updateThree').find('#tsfour_modal').val(),
                 ts5:  $('#updateThree').find('#tsfive_modal').val(),
                 ts6:  $('#updateThree').find('#tssix_modal').val(),
                 ts7:  $('#updateThree').find('#tsseven_modal').val(),
                },
                cache: false,
                success: function(data){
                    var dataResult = JSON.parse(data);
            if(dataResult.statusCode == 200){
                 $('#updateThree').find('input:text').val('');
                 $('#updateThree').find('textarea').val('');
                 $('#updateThree').modal().hide();
                 fetch_data_sub_three()
                alert("Data for sub3 content successfully updated!");
                location.reload();
             }
             }
          });
        }else{
            location.reload();  
        }
    });
    $('.exitThree1').click(function(){
        $('#updateThree').modal().hide();
        location.reload(); 
    });
    $('.closethree1').click(function(){
        $('#updateThree').modal().hide();
        location.reload(); 
    });
 });
        // DELETE THREE
 $(document).on('click', '#del_three', function(){
            var id = $(this).data("id");
            if(id != ""){
                if(confirm("Continue to remove the record")){
                    $.ajax({
                        url: "/../DiYer/Seeker/remThree",
                        method: "POST",
                        data: {id: id},
                        success: function(data){
                            var dataResult = JSON.parse(data);
                         if(dataResult.statusCode == 200){
                            fetch_data_sub_three();
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