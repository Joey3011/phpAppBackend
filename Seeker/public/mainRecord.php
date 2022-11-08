<?php
require __DIR__ . '/../src/bootstrap.php';
require_login();
?>
<?php view('header-content', ['title' => 'Main Content Record']) ?>
<span class="main-container"> 
    <div class="container">
        <div class="row">
            <div class="cols-xs-1">
                <input class="form-input mainholder" type="text" name="selectIssue" id="selectIssue" placeholder="Search..." autocomplete="off">
                <div class="col-md-12" style="color: royalblue; font-size: 19px; font-weight: 600; border-bottom: 2px solid royalblue">
                        <i class="fa fa-address-book" aria-hidden="true">&nbsp; Main Issue Record</i>
                </div>
                <div class="table-responsive" id="table-responsive" style="height: 50vh;"> <br />
                </div>             
            </div>
        </div>
    </div>
    <div class="modal" id="updatemain" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="color: #fff; background: royalblue; padding: 6px;">
                        <h5 class="modal-title"><i class="fa fa-address-book"></i>&nbsp;Update Main</h5>
                        <i class="fa fa-close closeMain" aria-hidden="true" style="color: #fff; font-size: 20px;"></i>
                </div>
                <div class="modal-body">
                <div class="row">
                  <input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">  
                    
                    <div class="col-md-12">
                        <lable class="form-label">Sub ID</lable>
                        <div>
                            <input type="text" readonly="true" name="subid_modal" id="subid_modal" class="form-control-sm" placeholder="ID" required>
                        </div>
                    </div>
                    <div  class="col-md-12">
                        <lable class="form-label">Main Issue</lable>
                        <div>
                            <textarea name="issue_modal" id="issue_modal" class="form-control-sm" placeholder="Issue" required></textarea>
                        </div>
                    </div>
                    <div  class="col-md-12">
                        <lable class="form-label">Explain/Intro</lable>
                        <div>
                            <textarea name="intro_modal" id="intro_modal" class="form-control-sm" placeholder="Intro to the issue (optional)"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer" style="padding-bottom: 0px !important; text-align: center !important;">
                        <p style="text-align: center; float: center;">
                            <button type="submit" id="editMain" class="btn btn-default btn-sm" style="background: royalblue; color: #fff;">Update</button>
                            <button type="button" class="btn btn-default btn-sm exitmain" aria-label="close" style="background: royalblue; color: #fff;">Close</button>
                     </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
//fetch main
function fetch_data_main(){
    $.ajax({
        url: "/../DiYer/Seeker/public_src_fetch/fetch",
        method: "POST",
        success: function(data){
            $('#table-responsive').html(data);
        }
    });
}
fetch_data_main();
$("#selectIssue").keyup(function(){
        var input = $(this).val();
        if(input != ""){
            $.ajax({
                url: "/../DiYer/Seeker/public_src_select/select",
                method: "POST",
                data: {input: input},
                success: function(data){
                    $('#table-responsive').html(data);
                }
            });
        }else{
            fetch_data_main();
        }
    });
//update
$(document).on('click','.updateMain', function(e){
        $('#updatemain').modal().show();
                      $('#updatemain').find('#id_modal').val($(this).data('id'));
                $('#updatemain').find('#subid_modal').val($(this).data('subid'));
                $('#updatemain').find('#issue_modal').val($(this).data('issue'));
                $('#updatemain').find('#intro_modal').val($(this).data('intro'));
    
              $('#editMain').click(function(){
                if(confirm("Continue to update record?")){
                $.ajax({
                    url: "/../DiYer/Seeker/updateMain",
                    method: "POST",
                    data: {
                    id: $('#updatemain').find('#id_modal').val(),
                      subid: $('#updatemain').find('#subid_modal').val(),                  
                     issue:  $('#updatemain').find('#issue_modal').val(),
                     intro:  $('#updatemain').find('#intro_modal').val(),
                    },
                    cache: false,
                    success: function(data){
                var dataResult = JSON.parse(data);
            if(dataResult.statusCode == 200){       
                $('#updatemain').find('input:text').val('');
                 $('#updatemain').find('textarea').val('');
                 fetch_data_main();
                alert("Data successfully updated!");
                location.reload();

                 }
                }
              });
            }else{
                location.reload(); 
            }
        });
        $('.closeMain').click(function(){
            $('#updatemain').modal().hide();
            location.reload();
        });
        $('.exitmain').click(function(){
            $('#updatemain').modal().hide();
            location.reload();
        });
     });
     //delete
     $(document).on('click', '#delete', function(){
        var id = $(this).data("id");
        if(id != ""){
            if(confirm("Continue to remove the record")){
                $.ajax({
                    url: "/../DiYer/Seeker/remove",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                        var dataResult = JSON.parse(data);
                     if(dataResult.statusCode == 200){
                        fetch_data_main();
                        alert("Record successfuly deleted!");
                    }else if(dataResult.statusCode == 201){
                            alert("Error Info: Integrity violation -> Cannot delete a parent row!!! You  need to delete the child row first!");
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