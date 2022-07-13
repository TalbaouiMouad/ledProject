import React, { useEffect, useState } from 'react'

function CartItems(){
    const cartFromLocalStorage=JSON.parse(localStorage.getItem('cart')||'[]');
    const [toto,setToto]=useState([]);
    function deleteFromCart(itemToBeDeleted){
      var table=cartFromLocalStorage.filter((_item)=>{
        return _item!=itemToBeDeleted
      });   
      setToto(table);
              localStorage.setItem('cart', JSON.stringify(table));
    }
    // useEffect(()=>{localStorage.setItem('cart', JSON.stringify(toto))},[toto]);
    return <div className="card text-white bg-secondary " >
        <div className="card-header text-center">My ShoppingCart</div>
        <div className="card-body table-responsive">
        <table className="table">
        <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
    <tbody>
          
    {cartFromLocalStorage.map((item)=>{
        
        return (
        <tr key={item.id}>
            <th scope="row" style={{width:"45%"}}><img src={item.img} /></th>
            <td style={{width:"45%"}}>{item.name}</td>
            <td><a className='btn' onClick={()=>{
              deleteFromCart(item)
            }}>Delete From Cart</a></td>
            
        </tr> 
          )
    })}
    </tbody>
    </table>
    </div>
    <div className='card-footer text-center'><a href='/shoppingcart' className='btn btn-primary' >Show ShoppingCart</a></div>
    
    </div>
  
}

export default CartItems