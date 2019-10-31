$(function(){
    $('#regForm').submit(function(){
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
   

        var result = true;
        if(name == ""){
            $('#name').parent().addClass('is-focused error');
            result = false;
        }
        
        
        return result;


    });


    });