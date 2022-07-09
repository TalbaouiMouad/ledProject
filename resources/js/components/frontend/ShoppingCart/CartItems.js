import React from 'react'

function CartItems(){
    const cartFromLocalStorage=JSON.parse(localStorage.getItem('cart')||'[]');
    return <div className="card text-white bg-secondary " >
        <div className="card-header text-center">My ShoppingCart</div>
        <div className="card-body table-responsive">
        <table className="table">
        <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Amount</th>
      
    </tr>
  </thead>
    <tbody>
          
    {cartFromLocalStorage.map((item)=>{
        
        return (
        <tr key={item.id}>
            <th scope="row" style={{width:"45%"}}><img src={item.img} /></th>
            <td style={{width:"45%"}}>{item.name}</td>
            <td>{item.amount}</td>
            
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