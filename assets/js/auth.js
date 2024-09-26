(function($){
    $("#frm_login").$(selector).submit(function (e) { 
        e.preventDefault();
        $.ajax({
            url:'usuarios/validarusuario',
            type:'POSt',
            data:$(this).serialize(),
            success: function(data){
                console.log()
            },
            error:function(){

            },
            
        });
    });
})(jQuery)