import axios from "axios";
import React, { useEffect, useState } from "react";

const cartFromLocalStorage=JSON.parse(localStorage.getItem('cart')||'[]');


function handleSubmit(id,name,img){
  
    const packets={
        id:id,
        productname:name,
        productimg:img
    };
    
    axios.post('/sendrequest', packets).then(
      res => { 
        
         window.location.href='/';
      }
    );
        
}
function Card (props){
    const products=props.products;
    const [cart, setCart] = useState(cartFromLocalStorage);
    console.log('crtls.',cartFromLocalStorage);
    console.log('local',cartFromLocalStorage.length);
    const addToCart=(product)=>{
      if (cartFromLocalStorage.length>0){
      for (let index = 0; index < cartFromLocalStorage.length; index++) {
        const element = cartFromLocalStorage[index];
        console.log('elem.',element);
        if (element.id===product.id) {
          console.log('element',product.id);
          element.amount=element.amount+1;
          console.log('amoun',element);
          cartFromLocalStorage.splice(index,1,element);
          setCart(cartFromLocalStorage);
          localStorage.setItem('cart', JSON.stringify(cart));
          return;
        }
        if (index===cartFromLocalStorage.length-1) {
          setCart([...cart,product]);
          localStorage.setItem('cart', JSON.stringify(cart));
          return ;
          
        }
      }
      }else{
       setCart([...cart,product]);
        localStorage.setItem('cart', JSON.stringify(cart));
        return ;
      }
    }
    useEffect(()=>{localStorage.setItem('cart', JSON.stringify(cart))},[cart])
 
return <div className="main-content">
  
{products.map((product)=>{
         if (product.product_price_offer) {
            
        return <div className="cardr" key={product.id} >
        <div className="cardr_img">
             <img src={product.photo}/> 
        </div>
        <div className="cardr_header">
            <h2>{product.product_name}</h2>
            <p>{product.small_description}</p>
            <div className=" card-footer disFlex">
               
                   
                    <p className="pricedashed">{product.product_price}<span>Dh</span></p>
                    <p className="price">{product.product_price_offer}<span>Dh</span></p>
                    
            
            <a  className="btn" onClick={ ()=>{
              addToCart({id:product.id,img:product.photo,name:product.product_name,amount:1})
              handleSubmit(product.id)}}>Add to cart</a>
            </div>
        </div>
    </div>
    }else{
        return <div className="cardr" key={product.id} >
        <div className="cardr_img">
             <img src={product.photo}/> 
        </div>
        <div className="cardr_header">
            <h2>{product.product_name}</h2>
            <p>{product.small_description}</p>
            <div className="card-footer disFlex">
               
                   
            <p className="price">{product.product_price}<span>Dh</span></p>
            
            <a  className="btn" onClick={ ()=>{
              addToCart({id:product.id,img:product.photo,name:product.product_name,amount:1})
              handleSubmit(product.id)}}>Add to cart</a>
            </div>
        </div>
    </div>
    }})}
</div>
}
export default Card;