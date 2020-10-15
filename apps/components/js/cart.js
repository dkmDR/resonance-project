$("document").ready(function(){
    const common = new Common();
    $("#proceed-checkout").click(function(e){
        e.preventDefault();
        const cart = localStorage.getItem('resonanceShoppingCart');
        if(cart!=null) {
            $.ajax({
                type: "POST",
                url: "save/cart",
                data: {cart: JSON.parse(cart)},
                dataType: "json",
                beforeSend: function () {
                    common.getSpin("true");
                },
                success: function (resource) {
                    if(resource.status) {
                        localStorage.removeItem('resonanceShoppingCart');
                        location.href = 'resonance/invoice/'+resource.order;
                    } else {
                        common.getSpin("false");
                        common.warningAlert(resource.message)
                    }
                },
                error: function () {
                    common.getSpin("false");
                    common.errorAlert(common.errorMessage());
                }
            });
        } else {
            common.warningAlert("Warning","Your cart is empty");
        }
    });
    $("body").on("click",".input-number-decrement",function(){
        const inputNumber = $(this).siblings(".input-number");
        let qty = parseInt(inputNumber.val())-1;
        if(qty>0) {
            inputNumber.val(qty);
            addToCart({
                code: inputNumber.attr("id"),
                qty: qty
            });
        } else {
            common.warningAlert("Qty must be higher than 0");
            inputNumber.val(1);
        }
    });
    $("body").on("click",".input-number-increment",function(){
        const inputNumber = $(this).siblings(".input-number");
        let qty = parseInt(inputNumber.val())+1;
        inputNumber.val(qty);
        addToCart({
            code: inputNumber.attr("id"),
            qty: qty
        });
    });
    $("body").on("blur",".input-number",function (){
        const value = $(this).val();
       if(isNaN(value)){
           $(this).val(1);
           addToCart({
               code: $(this).attr("id"),
               qty: 1
           });
       }
    });
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
            success: function(resource){
                $("#table-cart tbody").html(resource.list);
            },
            error: function(){
                common.errorAlert(common.errorMessage());
            }
        });
    }
}