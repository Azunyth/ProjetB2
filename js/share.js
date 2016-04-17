$(document).ready(function(){
 
    $(document).on('click', '.clickShare', function(e){
            e.preventDefault();
    $("#corps").load("shareUp.php #formShare,#listUpload");
   
 	
    });

});