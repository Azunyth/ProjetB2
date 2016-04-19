$(document).ready(function(){
 
    $(document).on('click', '.clickShare', function(e){
            e.preventDefault();
    $("#corps").load("shareUp.php .form,#listUpload");
   	
 	
    });

    $(document).on('click', '.clickAbsent', function(e){
            e.preventDefault();
    $("#corps").load("absence.php #container");
   	
 	
    });

});