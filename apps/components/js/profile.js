$("document").ready(function(){
    // const common = new Common();
    // $("#proceed-checkout").click(function(e){
    //     e.preventDefault();
    //     const cart = localStorage.getItem('resonanceShoppingCart');
    //     if(cart!=null) {
    //         $.ajax({
    //             type: "POST",
    //             url: "save/cart",
    //             data: {cart: JSON.parse(cart)},
    //             dataType: "json",
    //             beforeSend: function () {
    //                 common.getSpin("true");
    //             },
    //             success: function (resource) {
    //                 if(resource.status) {
    //                     localStorage.removeItem('resonanceShoppingCart');
    //                     location.href = 'resonance/invoice/'+resource.order;
    //                 } else {
    //                     common.getSpin("false");
    //                     common.warningAlert(resource.message)
    //                 }
    //             },
    //             error: function () {
    //                 common.getSpin("false");
    //                 common.errorAlert(common.errorMessage());
    //             }
    //         });
    //     } else {
    //         common.warningAlert("Warning","Your cart is empty");
    //     }
    // });
    //charge cart
    chargeOrders();
});
function chargeOrders(){
    const common = new Common();
    $.ajax({
        type: "POST",
        url: "get/my/orders",
        dataType: "json",
        success: function(resource){
            $("#table-cart tbody").html(resource.list);
        },
        error: function(){
            common.errorAlert(common.errorMessage());
        }
    });
}