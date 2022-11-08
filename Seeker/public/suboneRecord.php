<?php
require __DIR__ . '/../src/bootstrap.php';
require_login();
?>
<?php view('header-content', ['title' => 'Sub One Record']) ?>
    <div class="container">
        <div class="row">
            <div class="cols-xs-12">
                <input class="form-input mainholder" type="text" name="searchbar" id="suboneSearch" placeholder="Search..." autocomplete="off">
                    <div class="col-md-12" style="color: royalblue; font-size: 19px; font-weight: 600; border-bottom: 2px solid royalblue">
                        <i class="fa fa-address-book" aria-hidden="true">&nbsp; Sub One Record</i>
                    </div>
                <div class="table-responsive" id="table-responsive1"><br /></div>
            </div>
        </div>
    </div>
         <!--Modal Update--> 
    <div class="modal" id="updateOne" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="color: #fff; background: royalblue; padding: 6px;">
                     <h5 class="modal-title"><i class="fa fa-edit"></i>Update</h5>
                     <i class="fa fa-close closeOne1" aria-hidden="true" style="color: #fff; font-size: 20px;"></i>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
                        <div class="col-md-12">
                            <lable class="form-label">Sub ID</lable>
                            <div>
                                <input type="text" readOnly="true" name="subid_modal" id="subid_modal" class="form-control-sm">
                            </div>
                        </div>
                        <div  class="col-md-12">
                            <lable class="form-label">Sub Issue One</lable>
                            <div>
                                <textarea name="subissue_modal" id="subissue_modal" class="form-control-sm" placeholder="Sub Issue one"></textarea>
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
                                <textarea name="tsseven_modal" id="tsseven_modal" class="form-control-sm"  placeholder="TS seven"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding-bottom: 0px !important; text-align: center !important;">
                            <p style="text-align: center; float: center;">
                                <button type="submit" id="update_data_one" class="btn btn-default btn-sm" style="background: royalblue; color: #fff;">Update</button>
                                <button type="button" class="btn btn-default btn-sm exitOne1" aria-label="close" style="background:royalblue; color: #fff;">Close</button>
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
$("#suboneSearch").keyup(function(){
    var input = $(this).val();
    if(input != ""){
        $.ajax({
            url: "/../DiYer/Seeker/public_src_select/selectOne",
            method: "POST",
            data: {input: input},
            success: function(data){
                $('#table-responsive1').html(data);
            }
        });
    }else{
        fetch_data_sub_one();
    }
});
function fetch_data_sub_one(){
$.ajax({
    url: "/../DiYer/Seeker/public_src_fetch/fetchOne",
    method: "POST",
    success: function(data){
        $('#table-responsive1').html(data);
    }
});
}
fetch_data_sub_one();
//update
    $(document).on('click','.update_One', function(e){
        $('#updateOne').modal().show();
                $('#updateOne').find('#id_modal').val($(this).data('id'));
                $('#updateOne').find('#subid_modal').val($(this).data('subid'));
                $('#updateOne').find('#subissue_modal').val($(this).data('sub1'));
                $('#updateOne').find('#tsone_modal').val($(this).data('ts1'));
                $('#updateOne').find('#tstwo_modal').val($(this).data('ts2'));
                $('#updateOne').find('#tsthree_modal').val($(this).data('ts3'));
                $('#updateOne').find('#tsfour_modal').val($(this).data('ts4'));
                $('#updateOne').find('#tsfive_modal').val($(this).data('ts5'));
                $('#updateOne').find('#tssix_modal').val($(this).data('ts6'));
                $('#updateOne').find('#tsseven_modal').val($(this).data('ts7'));
    
              $('#update_data_one').click(function(){
                if(confirm("Continue to update record?")){
                $.ajax({
                    url: "/../DiYer/Seeker/updateOne",
                    method: "POST",
                    data: {
                        id: $('#updateOne').find('#id_modal').val(),
                    subid: $('#updateOne').find('#subid_modal').val(),
                     sub1:  $('#updateOne').find('#subissue_modal').val(),
                     ts1:  $('#updateOne').find('#tsone_modal').val(),
                     ts2:  $('#updateOne').find('#tstwo_modal').val(),
                     ts3:  $('#updateOne').find('#tsthree_modal').val(),
                     ts4:  $('#updateOne').find('#tsfour_modal').val(),
                     ts5:  $('#updateOne').find('#tsfive_modal').val(),
                     ts6:  $('#updateOne').find('#tssix_modal').val(),
                     ts7:  $('#updateOne').find('#tsseven_modal').val(),
                    },
                    cache: false,
                    success: function(data){
                var dataResult = JSON.parse(data);
            if(dataResult.statusCode == 200){       
                $('#updateOne').find('input:text').val('');
                 $('#updateOne').find('textarea').val('');
                 fetch_data_sub_one();
                 $('#updateOne').modal().hide();
                alert("Data for sub1 content successfully updated!");
                location.reload();
                 }
                }
              });
            }else{
                location.reload(); 
            }
        });
        $('.exitOne1').click(function(){
            $('#updateOne').modal().hide();
            location.reload();
        });
        $('.closeOne1').click(function(){
            $('#updateOne').modal().hide();
            location.reload();
        });
     });
  // DELETE ONE
  $(document).on('click', '#del_one', function(){
    var id = $(this).data("id");
    if(id != ""){
        if(confirm("Continue to remove the record")){
            $.ajax({
                url: "/../DiYer/Seeker/remOne",
                method: "POST",
                data: {id: id},
                success: function(data){
                    var dataResult = JSON.parse(data);
                 if(dataResult.statusCode == 200){
                    fetch_data_sub_one();
                    alert("Record successfuly deleted!");
                }
                }
            });
        }
    }
});    
});
</script>
<?php view('footer-content') ?>  