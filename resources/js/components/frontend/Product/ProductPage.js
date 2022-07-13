import React from 'react';
import icondesign from './img/icondesign.png';
import iconadapter from './img/iconadapter.png';
import iconinstall from './img/iconinstall.png';
import iconpower from './img/iconpower.png';
import iconshipping from './img/iconshipping.png';
import warranty from './img/warranty.jpg';
const productFromLocalStorage=JSON.parse(localStorage.getItem('productId')||'[]');
console.log(productFromLocalStorage);
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
const ProductPage =(props) => {
    const products=props.products;

  return (
    <div>
    <div className='product-app'>  
    {products.map((product)=>{
              if (product.id===productFromLocalStorage[0]) {
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
                       <button className='product-cart'>Add to cart</button>
                    </div>
                </div>
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
            return <div className='col'><div className="card text-bg-success text-center p-2 mb-3 shadow  rounded" style={{width: "18rem"}} key={cart.id}>
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