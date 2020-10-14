$(document).ready(function (){
    const common = new Common();
    $("#get-info").click(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'send/product/info',
            data: {data: $("#send-data").val()},
            dataType: "json",
            beforeSend:function (){common.getSpin("true");},
            success:function(response){
                common.getSpin("false");
                if(response.status){
                    common.successAlert("Success",response.message);
                } else {
                    common.warningAlert("Warning",response.message);
                }
            },
            error:function(){common.getSpin("false");common.errorAlert("Error",common.errorMessage());}
        });
    });
    $("#add-product-to-cart").click(function (e){
        e.preventDefault();
        const object = {
            code: $("#send-data").val(),
            qty: $("#product-qty").val()
        };
        addToCart(object);
        $("#product-qty").val(1);
    });
    $("#decrement").click(function(){
        let qty = parseInt($("#product-qty").val())-1;
        if(qty>0)
            $("#product-qty").val(qty);
    });
    $("#increment").click(function(){
        let qty = parseInt($("#product-qty").val())+1;
        $("#product-qty").val(qty);
    });
});