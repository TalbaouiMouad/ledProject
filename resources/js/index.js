import { countBy } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';

import Sidebar from './components/dashboard/Sidebar';
import Card from './components/frontend/Card/Card';



if (document.getElementById('sidebar')) {
    ReactDOM.render(<Sidebar />, document.getElementById('sidebar'));
}

if (document.getElementById('card')) {    
const value = document.getElementById('card').getAttribute("products");
const products=JSON.parse(value);
ReactDOM.render(<Card products={products} />,document.getElementById('card'))
}