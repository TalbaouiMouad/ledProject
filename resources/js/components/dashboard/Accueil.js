import React from 'react'
const shopFromLocalStorage=JSON.parse(localStorage.getItem('shop')||'[]');
const clientFromLocalStorage=JSON.parse(localStorage.getItem('client')||'[]');

export default function Accueil() {
  return (
    <div>
        <table className="table mt-2 ">
            <thead>
                <tr>
                <th scope="col">Client Name</th>
                <th scope="col">Client Email</th>
                <th scope="col">Client Adress</th>
                <th scope="col">Product Id</th>
                <th scope="col">Product Name</th>
                </tr>
            </thead>
            <tbody>
                {clientFromLocalStorage.map((client,index)=>{
                    return<tr>
                        <td>{client.addresses.billing_name}</td>
                        <td>{client.token.email}</td>
                        <td>{client.addresses.billing_address_line1},{client.addresses.billing_address_city},{client.addresses.billing_address_country}</td>
                        <td>{shopFromLocalStorage[index].id}</td>
                        <td>{shopFromLocalStorage[index].product_name}</td>
                    </tr>
                })}
            </tbody>
        </table>
    </div>
  )
}
