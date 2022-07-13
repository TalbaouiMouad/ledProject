import React, { useEffect, useState } from 'react';
import icondesign from './img/icondesign.png';
import iconadapter from './img/iconadapter.png';
import iconinstall from './img/iconinstall.png';
import iconpower from './img/iconpower.png';
import iconshipping from './img/iconshipping.png';
import warranty from './img/warranty.jpg';

import axios from 'axios';
import StripeCheckout from 'react-stripe-checkout';




const productFromLocalStorage=JSON.parse(localStorage.getItem('productId')||'[]');
const cartFromLocalStorage=JSON.parse(localStorage.getItem('cart')||'[]');
const shopFromLocalStorage=JSON.parse(localStorage.getItem('shop')||'[]');
const clientFromLocalStorage=JSON.parse(localStorage.getItem('client')||'[]');


  
const productPageCart=[
    {   id:1,
        img:icondesign,
        title:'Customized Neon Signs',
        description:'All of our neon light signs are custom designed by us, and can be altered to your specifications, size and colors. We can make any neon sign you want, in any fonts and a wide selection of colors.'
    },
    {   id:2,
        img:iconadapter,
        title:'Adapter Included',
        description:'Your new LED neon comes with a 4.9 ft transparent cord which plugs into a certified adapter (if you need an adapter for another country, ask when checking out). The adapter has an additional 3-6 ft of cable that plugs into the socket.'
    },
    {   id:3,
        img:iconinstall,
        title:'Easy to Install',
        description:'Our LED Neon signs are mounted on high quality, clear acrylic backboards, stands or boxes. Backboards feature pre-drilled holes for easy wall mounting, and are ready for mounting, right out of the box.'
    },
    {   id:4,
        img:iconpower,
        title:'Low Energy, High Brightness',
        description:'Our LED neon signs are both economical and ecologically friendly. They have low energy consumption and a 100,000+ hours lifespan'
    },
    {   id:5,
        img:iconshipping,
        title:'Worldwide Shipping',
        description:' Standard orders take 3-5 weeks*, including production and shipping. Rush orders take 2-3 weeks*, including production and shipping to addresses in the USA and Canada. Please choose the Rush My Order option at checkout, and let us know the date by which you need your sign to arrive.'
    },
    {   id:6,
        img:warranty,
        title:'24 Months Warranty',
        description:'We offer the latest LED neon flex technology which is both stronger & lighter than glass neon tubes. All of our indoor and outdoor signs come with a 24-month manufacturer warranty covering faulty items. Click here for more details'
    }
];
function showProductPage(id){
    const productId=[id];
    localStorage.setItem('productId', JSON.stringify(productId));
    window.location.href='/product';
  }
function ProductPage (props)  {
    const products=props.products;
const [cart, setCart] = useState(cartFromLocalStorage);
const [btnAction,setBtnAction]=useState(0);
const [shop,setShop]=useState(shopFromLocalStorage);
const [client,setClient]=useState(clientFromLocalStorage);
useEffect(()=>{ cartFromLocalStorage.map((item)=>{
        if (item.id===productFromLocalStorage[0]) {
            setBtnAction(1);
            console.log('btn',btnAction);
        }
    })})
     function hundleToken(token,addresses){
        setClient([...client,{token:token,addresses:addresses}]);
        localStorage.setItem('client', JSON.stringify(client));
        console.log(token,addresses);

     }
const addToCart=(product)=>{
    if (cartFromLocalStorage.length>0){
        for (let index = 0; index < cartFromLocalStorage.length; index++) {
            const element = cartFromLocalStorage[index];
            console.log('elem.',element);
            if (element.id===product.id) {
              cartFromLocalStorage.splice(index,1,element);
              setCart(cartFromLocalStorage);
              localStorage.setItem('cart', JSON.stringify(cart));
              return;
            }}
        setCart([...cart,product]);
        localStorage.setItem('cart', JSON.stringify(cart));
    }}
    const addToShop=(product)=>{
        setShop([...shop,product]);
        localStorage.setItem('shop', JSON.stringify(shop));}
    useEffect(()=>{localStorage.setItem('cart', JSON.stringify(cart))},[cart])
    useEffect(()=>{localStorage.setItem('shop', JSON.stringify(shop))},[shop])
    useEffect(()=>{localStorage.setItem('client', JSON.stringify(client))},[client])
    console.log('shopFromLocalStorage',shopFromLocalStorage);
 
  return (
    <div>
    <div className='product-app'>  
    {products.map((product)=>{
              if (product.id===productFromLocalStorage[0] ) {
                if (btnAction) {
                    return<div className='details'>
                    <div className='big-img'>
                        <img src={product.photo} alt={product.product_name}/>
                    </div>
                    <div className='box'>
                        <div className='product-row'>
                            <h2>{product.product_name}</h2>
                            <span>{product.product_price} Dh</span>
                        </div>
                       <p>{product.small_description}</p>
                       <p>{product.long_description}</p> 
                       
                        
                            <StripeCheckout
                            stripeKey='pk_test_51LL7qpBgJQG9c2lDd845gcXyVkzP9OXiDETHAJHemDovvOk3KauC73Eyj2EGnif0DGSDuwH3bcbsjUlwQDuI7Kp600ObK4oMlq'
                            token={hundleToken}
                            billingAddress
                            shippingAddress
                            amount={product.product_price*100}
                            name={product.product_name}
                            > <a className='btn btn-warning' onClick={()=>{
                                addToShop(product)
                            }} >Shop Now</a></StripeCheckout>
                      
                       
                       
                    </div>
                </div>
                } else {
                     return<div className='details'>
                    <div className='big-img'>
                        <img src={product.photo} alt={product.product_name}/>
                    </div>
                    <div className='box'>
                        <div className='product-row'>
                            <h2>{product.product_name}</h2>
                            <span>{product.product_price} Dh</span>
                        </div>
                       <p>{product.small_description}</p>
                       <p>{product.long_description}</p> 
                       
                        
                       
                       <a className='product-cart' onClick={ ()=>{
              addToCart({id:product.id,img:product.photo,name:product.product_name});
              showProductPage(product.id)
              }}>Add to cart</a>
                    </div>
                </div>
                }
                
            }}
             )}
        </div>
        <div className='container text-light'>
            <div className='row'>
                <h1 className='text-center'>LED NEON POP CULTURE SIGNS <br/> <strong>WOW!</strong></h1>
                <div className='col'>
                    <p>Neon wall art that POPS! This bold and beautiful LED neon sign would look perfect in a bedroom, games room, arcade or anywhere.
                Have a unique design in mind? Upload your image or idea and our designers will send you a free neon sign mockup. <br/>
                <strong>Safety:</strong> Our neon flex LED signs, lights and lamps are shatter resistant, energy efficient, recyclable, UV resistant and conform to CE, RoHS and UL certification.</p>
                </div>
                <div className='col'>
                    <p>Have a unique design in mind? Upload your image or idea and our designers will send you a free neon sign mockup.</p>
                </div>
      </div> 
      <div className='row'>
       { productPageCart.map((cart)=>{
            return <div className='col'><div className="card text-bg-primary text-center p-2 mb-3 shadow  rounded" style={{width: "18rem"}} key={cart.id}>
                <img className="card-img-top bg-light"style={{width: "40%",margin:'auto'}} src={cart.img} alt="Card image cap"></img>
                <div className="card-body">
                <h5 className="card-title">{cart.title}</h5>
    <p className="card-text">{cart.description}</p>
  </div>
            </div></div>
        })}

        
      </div> 
      </div>
    </div>
  )
}



export default ProductPage