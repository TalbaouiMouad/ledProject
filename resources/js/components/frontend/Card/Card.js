import React from "react";
import './cardstyle.css'

function Card (props){
    const product=props.products;
    var table=[];
    console.log(typeof table);
    for(var i in product){
    table.push(product[i]);
}
return <div className="main-content">
{table.map((product)=>{
        return (<div className="cardr" key={product.id} onClick={props.onclik}>
        <div className="cardr_img">
             <img src={product.photo}/> 
        </div>
        <div className="cardr_header">
            <h2>{product.product_name}</h2>
            <p>{product.small_description}</p>
            <div className="cardr_footer">
            <p className="price">{product.product_price}<span>Dh</span></p>
            <a href='#' className="btn">Add to cart</a>
            </div>
        </div>
    </div>);
    })}

</div>
    
        
    
   

}
        


export default Card;