/*global $*/
$(document).ready(function(){

    $.getJSON('data.php', function(data) {
        console.log(data);
    });
    
    $('#invInput').keypress(function(event){
        if(event.which == 13){
            console.log("Ciao dal tasto Enter");
        }
    })
    
    
})