$("document").ready(function(){

    //charge cart
    chargeCart();
});
function chargeCart(){
    const common = new Common();
    const cart = localStorage.getItem('resonanceShoppingCart');
    if(cart!=null){
        $.ajax({
            type: "POST",
            url: "get/cart/list",
            data: {cart: JSON.parse(cart)},
            dataType: "json",
            beforeSend: function(){},
            success: function(resource){
                $("#table-cart tbody").html(resource.list);
            },
            error: function(){
                common.errorAlert(common.errorMessage());
            }
        });
    }
}