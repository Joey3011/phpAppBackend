$(document).ready(function(){
    function fetch_data_user(){
        $.ajax({
            url: "/../DiYer/Seeker/user",
            method: "POST",
            success: function(data){
                $('#table-responsive_user').html(data);
            }
        });
    }
    fetch_data_user();
});