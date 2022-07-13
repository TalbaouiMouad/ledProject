import { countBy } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';

import Sidebar from './components/dashboard/Sidebar';
import Card from './components/frontend/Card/Card';
import CartItems from './components/frontend/ShoppingCart/CartItems';
import Slider from './components/frontend/Slider/Slider';
import { Footer } from './components/frontend/Footer/Footer';
import ShoppingCart from './components/frontend/ShoppingCart/ShoppingCart';
import ProductPage from './components/frontend/Product/ProductPage';
import Carouselle from './components/frontend/Product/Carousel';
import Checkout from './components/frontend/Checkout/Checkout';
import Accueil from './components/dashboard/Accueil';



if (document.getElementById('sidebar')) {
    ReactDOM.render(<Sidebar />, document.getElementById('sidebar'));
}

if (document.getElementById('card')) {    
const value = document.getElementById('card').getAttribute("products");
const products=JSON.parse(value);
const table=[];
for(var i in products){
    table.push(products[i]);
}
ReactDOM.render(<Card products={table} />,document.getElementById('card'))
}
if (document.getElementById('cartitems')) {
    ReactDOM.render(<CartItems />, document.getElementById('cartitems'));
}
if (document.getElementById('slider')) {
    ReactDOM.render(<Slider />, document.getElementById('slider'));
}
if(document.getElementById('footer')){
    ReactDOM.render(<Footer/>,document.getElementById('footer'));
}
if (document.getElementById('orders')) {
    ReactDOM.render(<Accueil />, document.getElementById('orders'));
}
if(document.getElementById('shoppingCart')){
    const value = document.getElementById('shoppingCart').getAttribute("products");
const products=JSON.parse(value);
const table=[];
for(var i in products){
    table.push(products[i]);
}
    ReactDOM.render(<ShoppingCart products={table}/>,document.getElementById('shoppingCart'));
}
if(document.getElementById('showproduct')){
    const value = document.getElementById('showproduct').getAttribute("products");
const products=JSON.parse(value);
const table=[];
for(var i in products){
    table.push(products[i]);
}
    ReactDOM.render(<ProductPage products={table}/>,document.getElementById('showproduct'));
}
if(document.getElementById('carousel')){
    const value = document.getElementById('carousel').getAttribute("products");
const products=JSON.parse(value);
const table=[];
for(var i in products){
    table.push(products[i]);
}
    ReactDOM.render(<Carouselle products={table}/>,document.getElementById('carousel'));
}
if(document.getElementById('checkout')){
    const value = document.getElementById('checkout').getAttribute("products");
const products=JSON.parse(value);
const table=[];
for(var i in products){
    table.push(products[i]);
}
    ReactDOM.render(<Checkout products={table}/>,document.getElementById('checkout'));
}
if(document.getElementById('checkout')){
    const value = document.getElementById('checkout').getAttribute("products");
const products=JSON.parse(value);
const table=[];
for(var i in products){
    table.push(products[i]);
}
    ReactDOM.render(<Checkout products={table}/>,document.getElementById('checkout'));
}