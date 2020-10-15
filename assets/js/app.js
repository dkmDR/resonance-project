$(document).ready(function(){
    const common = new Common();
   $("#logOut").click(function(e){
       e.preventDefault();
       common.confirmAlert("Confirmation","Are you sure to get out?").then(value => {
           if(value){
               localStorage.removeItem('resonanceShoppingCart');
               common.getSpin("true");
               location.href = "logout";
           }
       });
   });

    //set parameter on DOM
    setShoppingCartProperties();
});