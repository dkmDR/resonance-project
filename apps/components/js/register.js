$(document).ready(function(){
    const common = new Common();
    $("#signUp").click(function(){
        $.ajax({
            type: "POST",
            url: "save/user",
            data: {form: $("#register-form").serializeArray()},
            dataType: "json",
            beforeSend: function(){
                common.getSpin("true");
            },
            success: function(response){
                common.getSpin("false");
                if(response.code==200){
                    common.successAlert("Success",response.message).then(val=>{
                        location.href = 'login';
                    });
                } else {
                    common.warningAlert("Warning",response.message);
                }
            },
            error: function(){
                common.getSpin("false");
                common.errorAlert(common.errorMessage());
            }
        });
    });
})