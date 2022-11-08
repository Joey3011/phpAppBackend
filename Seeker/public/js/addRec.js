$(document).ready(function(){
 $('#main').on("submit", function(){
        var dataString= $(this).serialize();
            $.ajax({
                url: "/../DiYer/Seeker/add_main_content",
                method: "POST",
                data: dataString,
                cache: false,
                success: function(data){
                    var dataResult = JSON.parse(data);
                    if(dataResult.statusCode == 200){
                        alert("Data for main sub issue successfully added!");
                        $('#main').find('input:text').val('');
                        $('#main').find('textarea').val('');
                        location.reload();
                    }else if(dataResult.statusCode == 201){
                        alert("Integrity violation[code:1062 -> Duplicate entry!!! You are trying to add record wih dduplicate key!!!");
                        $('#main').find('input:text').val('');
                        $('#main').find('textarea').val('');
                    }  
            }
        });
       return false;
    });

    $('#one').on("submit", function(){
        var dataString= $(this).serialize(); 
            $.ajax({
                url: "/../DiYer/Seeker/add_sub_one",
                method: "POST",
                data: dataString,
                cache: false,
                success: function(data){
                    var dataResult = JSON.parse(data);
                if(dataResult.statusCode == 200){
                    alert("Data for sub issue category one successfully added!");
                    $('#one').find('input:text').val('');
                    $('#one').find('textarea').val('');
                    location.reload();
                }else if(dataResult.statusCode == 201){
                    alert("Integrity constraint violation[code: 1452 -> Cannot add or update a child row]!!! You are trying to add sub-record with no main issue!!! Pls add Main issue at main content with unique ID associated on it. It is a MUST to include ID in every record to be added...");
                    $('#one').find('input:text').val('');
                    $('#one').find('textarea').val('');
                }else if(dataResult.statusCode == 202){
                    $('#one').find('input:text').val('');
                    $('#one').find('textarea').val('');
                alert("Integrity violation[code:1062 -> Duplicate key entry for sub child!!! You are trying to add record wih dduplicate key!!!");
             }
            }
        });
        return false;
    });

    $('#two').on("submit", function(){
        var dataString= $(this).serialize(); 
            $.ajax({
                url: "/../DiYer/Seeker/add_sub_two",
                method: "POST",
                data: dataString,
                cache: false,
                success: function(data){
                    var dataResult = JSON.parse(data);
                if(dataResult.statusCode == 200){
                    alert("Data for sub issue category two successfully added!");
                    $('#two').find('input:text').val('');
                    $('#two').find('textarea').val('');  
                    location.reload();
                }else if(dataResult.statusCode == 201){
                    alert("Integrity constraint violation[code: 1452 -> Cannot add or update a child row]!!! You are trying to add sub-record with no main issue!!! Pls add Main issue at main content with unique ID associated on it. It is a MUST to include ID in every record to be added...");
                    $('#two').find('input:text').val('');
                    $('#two').find('textarea').val('');  
                }else if(dataResult.statusCode == 202){
                    $('#two').find('input:text').val('');
                    $('#two').find('textarea').val('');  
                alert("Integrity violation[code:1062 -> Duplicate key entry for sub child!!! You are trying to add record wih dduplicate key!!!");
             }
            }
        });
        return false;
    });
    $('#three').on("submit", function(){
        var dataString= $(this).serialize(); 
            $.ajax({
                url: "/../DiYer/Seeker/add_sub_three",
                method: "POST",
                data: dataString,
                cache: false,
                success: function(data){
                    var dataResult = JSON.parse(data);
                if(dataResult.statusCode == 200){
                    alert("Data for sub issue category three successfully added!");
                    $('#three').find('input:text').val('');
                    $('#three').find('textarea').val(''); 
                    location.reload();
                }else if(dataResult.statusCode == 201){
                    alert("Integrity constraint violation[code: 1452 -> Cannot add or update a child row]!!! You are trying to add sub-record with no main issue!!! Pls add Main issue at main content with unique ID associated on it. It is a MUST to include ID in every record to be added...");               
                    $('#three').find('input:text').val('');
                    $('#three').find('textarea').val(''); 
                }else if(dataResult.statusCode == 202){
                    $('#three').find('input:text').val('');
                    $('#three').find('textarea').val(''); 
                alert("Integrity violation[code:1062 -> Duplicate key entry for sub child!!! You are trying to add record wih dduplicate key!!!");
             }
            }
        });
        return false;
    });
    $('#four').on("submit", function(){
        var dataString= $(this).serialize(); 
            $.ajax({
                url: "/../DiYer/Seeker/add_sub_four",
                method: "POST",
                data: dataString,
                cache: false,
                success: function(data){
                    var dataResult = JSON.parse(data);
                if(dataResult.statusCode == 200){
                    alert("Data for sub issue category four successfully added!");
                    $('#four').find('input:text').val('');
                    $('#four').find('textarea').val('');  
                    location.reload();
                }else if(dataResult.statusCode == 201){
                    alert("Integrity constraint violation[code: 1452 -> Cannot add or update a child row]!!! You are trying to add sub-record with no main issue!!! Pls add Main issue at main content with unique ID associated on it. It is a MUST to include ID in every record to be added...");           
                    $('#four').find('input:text').val('');
                    $('#four').find('textarea').val('');  
                }else if(dataResult.statusCode == 202){
                    $('#four').find('input:text').val('');
                    $('#four').find('textarea').val(''); 
                alert("Integrity violation[code:1062 -> Duplicate key entry for sub child!!! You are trying to add record wih dduplicate key!!!");
             }
             }
        });
        return false;
    });

    $('#five').on("submit", function(){
        var dataString= $(this).serialize(); 
            $.ajax({
                url: "/../DiYer/Seeker/add_sub_five",
                method: "POST",
                data: dataString,
                cache: false,
                success: function(data){
                    var dataResult = JSON.parse(data);
                if(dataResult.statusCode == 200){
                    alert("Data for sub issue category five successfully added!");
                    $('#five').find('input:text').val('');
                    $('#five').find('textarea').val(''); 
                    location.reload();
                }else if(dataResult.statusCode == 201){
                    alert("Integrity constraint violation[code: 1452 -> Cannot add or update a child row]!!! You are trying to add sub-record with no main issue!!! Pls add Main issue at main content with unique ID associated on it. It is a MUST to include ID in every record to be added..."); 
                    $('#five').find('input:text').val('');
                    $('#five').find('textarea').val('');  
                }else if(dataResult.statusCode == 202){
                    $('#five').find('input:text').val('');
                    $('#five').find('textarea').val('');  
                alert("Integrity violation[code:1062 -> Duplicate key entry for sub child!!! You are trying to add record wih dduplicate key!!!");
             }
            }
        });
        return false;
    });
});