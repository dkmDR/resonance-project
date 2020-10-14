$(document).ready(function(){
    const common = new Common();
    $("#login").click(function(){
        $.ajax({
            type: "POST",
            url: "login/user",
            data: {form: $("#login-form").serializeArray()},
            dataType: "json",
            beforeSend: function(){
                common.getSpin("true");
            },
            success: function(response){
                if(response.code==200){
                    location.href = 'home';
                } else {
                    common.getSpin("false");
                    common.warningAlert("Warning",response.message);
                }
            },
            error: function(){
                common.getSpin("false");
                common.errorAlert(common.errorMessage());
            }
        });
    });
});