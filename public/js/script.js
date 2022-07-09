var cart=document.getElementById('cartcount');
var cartItems=document.getElementById('cartitems')
function cartCount(){const cartFromLocalStorage=JSON.parse(localStorage.getItem('cart')||'[]');
let count=0;
if (cartFromLocalStorage.length>0) {
  
}
for (let properties in cartFromLocalStorage) {
    count = count + 1
  }
cart.innerHTML=count;}

setInterval(cartCount,50);

