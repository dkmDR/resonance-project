$(document).ready(function(){
    const common = new Common();
    $("#select-product-by-type").change(function(){
        const value = $(this).val();
        if(value){
            common.getSpin("true");
            location.href = "categories/"+value;
        }
    });
});