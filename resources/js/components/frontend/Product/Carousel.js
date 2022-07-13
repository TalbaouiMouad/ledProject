import React, { useState } from 'react'
import Carousel from 'react-elastic-carousel';
import Item from "./items";

const breakPoints = [
    { width: 1, itemsToShow: 1 },
    { width: 550, itemsToShow: 2 },
    { width: 768, itemsToShow: 3 },
    { width: 1200, itemsToShow: 4 },
  ];
export default function Carouselle (props)  {
    const [items,setItems]=useState(props.products);
    console.log(items);
  return (<div className='container my-3'>
    <h1 className='text-light text-center my-3'>You may also like</h1>
    <Carousel breakPoints={breakPoints}>{items.map((item => <Item key={item.id}><img src={item.photo}/></Item>))}</Carousel>
  </div>)
}
