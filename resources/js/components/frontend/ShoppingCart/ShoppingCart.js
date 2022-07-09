import React from 'react'

const ShoppingCart = (props) => {
    const cartFromLocalStorage=JSON.parse(localStorage.getItem('cart')||'[]');
    const products=props.products;
    
    return( 
        <div className='mx-5'>
            
        {cartFromLocalStorage.map((element)=> {
        console.log('element',element);
        return products.map((product)=>{
            console.log('product',product);
            if (product.id===element.id) {
                console.log(product.id,element.id);
                return <div key={element.id} className="card text-white bg-dark d-inline-block mb-2 mx-2 pb-2" style={{width:" 18rem",height:'max-content'}}>
                        <div className='card-header'><img src={product.photo} alt='...'/></div>
                <div className="card-body ">
                    <h5 className="card-title">{product.product_name}</h5>
                  <p className="card-text">{product.product_price}Dh</p>
                  </div>
                  <div className='text-center'><a href="#" className="btn btn-primary">Shop Now</a></div>
                </div>
              
            }
            
        })
        
    })}
    
    </div>
    )
}

export default ShoppingCart