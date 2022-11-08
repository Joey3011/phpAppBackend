<?php
require __DIR__ . '/../src/bootstrap.php';
require_login();
?>
<?php view('header-content', ['title' => 'Sub Two Record']) ?>
<span class="main-container"> 
    <div class="container">
        <div class="row">
            <div class="cols-xs-1">
                <input class="form-input mainholder" type="text" name="searchbar" id="subtwoSearch" placeholder="Search..." autocomplete="off">
                    <div class="col-md-12" style="color: royalblue; font-size: 19px; font-weight: 600; border-bottom: 2px solid royalblue">
                        <i class="fa fa-address-book" aria-hidden="true">&nbsp; Sub Two Record</i>
                    </div>
                <div class="table-responsive" id="table-responsive2"><br /></div>
            </div>
        </div>
    </div>
         <!--Modal Update--> 
    <div class="modal" id="updateTwo" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="color: #fff; background: royalblue; padding: 6px;">
                     <h5 class="modal-title"><i class="fa fa-edit"></i>Update</h5>
                     <i class="fa fa-close closetwo1" aria-hidden="true" style="color: #fff; font-size: 20px;"></i>
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
                            <lable class="form-label">Sub Issue Two</lable>
                            <div>
                                <textarea name="subissue_modal" id="subissue_modal" class="form-control-sm" placeholder="Sub Issue two"></textarea>
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
                                <button type="submit" id="update_data_two" class="btn btn-default btn-sm" style="background: royalblue; color: #fff;">Update</button>
                                <button type="button" class="btn btn-default btn-sm exitTwo1" aria-label="close" style="background:royalblue; color: #fff;">Close</button>
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
  $("#subtwoSearch").keyup(function(){
    var input = $(this).val();
    if(input != ""){
        $.ajax({
            url: "/../DiYer/Seeker/public_src_select/selectTwo",
            method: "POST",
            data: {input: input},
            success: function(data){
                $('#table-responsive2').html(data);
            }
        });
    }else{
        fetch_data_sub_two();
    }
});
function fetch_data_sub_two(){
$.ajax({
    url: "/../DiYer/Seeker/public_src_fetch/fetchTwo",
    method: "POST",
    success: function(data){
        $('#table-responsive2').html(data);
    }
});
}
fetch_data_sub_two();
 //update
 $(document).on('click','.update_Two', function(e){
    $('#updateTwo').modal().show();
            $('#updateTwo').find('#id_modal').val($(this).data('id'));
            $('#updateTwo').find('#subid_modal').val($(this).data('subid'));
            $('#updateTwo').find('#subissue_modal').val($(this).data('sub1'));
            $('#updateTwo').find('#tsone_modal').val($(this).data('ts1'));
            $('#updateTwo').find('#tstwo_modal').val($(this).data('ts2'));
            $('#updateTwo').find('#tsthree_modal').val($(this).data('ts3'));
            $('#updateTwo').find('#tsfour_modal').val($(this).data('ts4'));
            $('#updateTwo').find('#tsfive_modal').val($(this).data('ts5'));
            $('#updateTwo').find('#tssix_modal').val($(this).data('ts6'));
            $('#updateTwo').find('#tsseven_modal').val($(this).data('ts7'));

          $('#update_data_two').click(function(){
            if(confirm("Continue to update record?")){
            $.ajax({
                url: "/../DiYer/Seeker/updateTwo",
                method: "POST",
                data: {
                    id: $('#updateTwo').find('#id_modal').val(),
                subid: $('#updateTwo').find('#subid_modal').val(),
                 sub1:  $('#updateTwo').find('#subissue_modal').val(),
                 ts1:  $('#updateTwo').find('#tsone_modal').val(),
                 ts2:  $('#updateTwo').find('#tstwo_modal').val(),
                 ts3:  $('#updateTwo').find('#tsthree_modal').val(),
                 ts4:  $('#updateTwo').find('#tsfour_modal').val(),
                 ts5:  $('#updateTwo').find('#tsfive_modal').val(),
                 ts6:  $('#updateTwo').find('#tssix_modal').val(),
                 ts7:  $('#updateTwo').find('#tsseven_modal').val(),
                },
                cache: false,
                success: function(data){
                    var dataResult = JSON.parse(data);
            if(dataResult.statusCode == 200){
                 $('#updateTwo').find('input:text').val('');
                 $('#updateTwo').find('textarea').val('');
                 $('#updateTwo').modal().hide();
                 fetch_data_sub_two()
                alert("Data for sub2 content successfully updated!");
                location.reload();
                 }
             }
          });
        }else{
            location.reload();  
        }
    });
    $('.exitTwo1').click(function(){
        $('#updateTwo').modal().hide();
        location.reload();
    });
    $('.closetwo1').click(function(){
        $('#updateTwo').modal().hide();
        location.reload();
    });
 });
     // DELETE TWO
     $(document).on('click', '#del_two', function(){
        var id = $(this).data("id");
        if(id != ""){
            if(confirm("Continue to remove the record")){
                $.ajax({
                    url: "/../DiYer/Seeker/remTwo",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                        var dataResult = JSON.parse(data);
                     if(dataResult.statusCode == 200){
                        fetch_data_sub_two();
                        alert("Record successfuly deleted!");
                    }
                    }
                });
            }
        }
    }); 
})
</script>       
</span>
<?php view('footer-content') ?>  