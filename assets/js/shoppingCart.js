const localSessionKey = 'resonanceShoppingCart';
/**
 *
 * @param item
 * @returns {boolean}
 */
function addToCart(item){
    let cart = localStorage.getItem(localSessionKey);
    if(cart==null){
        //empty cart
        cart = [];
        newInCart(cart, item);
        setShoppingCartProperties();
        return true;
    }
    cart = JSON.parse(cart);
    let index = getIndex(cart,item.code);
    if(index==null){
        //add
        newInCart(cart,item);
    } else {
        //update qty
        updateFromCart(index,cart,item);
    }
    //set parameter on DOM
    setShoppingCartProperties();
}
/**
 *
 * @param cart
 * @param item
 */
function newInCart(cart,item){
    cart.push({
        item: item.code,
        qty: item.qty
    });
    localStorage.setItem(localSessionKey,JSON.stringify(cart));
}
function deleteFromCart(){

}
/**
 *
 * @param index
 * @param cart
 * @param item
 */
function updateFromCart(index,cart,item){
    const qty = parseInt(cart[index].qty);
    cart[index].qty = qty + parseInt(item.qty);
    localStorage.setItem(localSessionKey,JSON.stringify(cart));
}
/**
 *
 * @param cart
 * @param item
 * @returns {null|number}
 */
function getIndex(cart,item){
    for(let i=0;i<cart.length;i++){
        const object = cart[i];
        if ( object.item == item ) {
            return i;
        }
    }
    return null;
}
/**
 * set parameter on DOM
 */
function setShoppingCartProperties(){
    $("body").find("#shopping-cart-qty").text(getShoppingCartQty());
}
/**
 *
 * @returns {number}
 */
function getShoppingCartQty(){
    let cart = localStorage.getItem(localSessionKey),
        qty = 0;
    cart = JSON.parse(cart);
    if(cart!=null)
        for(let i=0;i<cart.length;i++){
            qty += parseInt(cart[i].qty);
        }
    return qty;
}