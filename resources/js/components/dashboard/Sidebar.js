
import React, { useState } from 'react'
import'./style.css'


function Sidebar() {
    const SidebarData=[
        {
            title:'Home',
            path:'/',
            icon:<i className="bi bi-house-door-fill"></i>,
            cName:'nav-text'
        },
        {
            title:'Comments',
            path:'/dashboard/comments',
            icon:<i className="bi bi-list-columns-reverse"></i>,
            cName:'nav-text'
        },
        {
            title:'Products',
            path:'/dashboard/product',
            icon:<i className="bi bi-bag-fill"></i>,
            cName:'nav-text'
        },
        {
            title:'Users',
            path:'/dashboard/users',
            icon:<i className="bi bi-people-fill"></i>,
            cName:'nav-text'
        },
        {
            title:'Messages',
            path:'/messages',
            icon:<i className="bi bi-envelope-paper-fill"></i>,
            cName:'nav-text'
        },
    ];
    const[isActive,setActive]=useState('true');
    const handleToggle=()=>{
        setActive(!isActive);
    }
  return (
      <div className={isActive?'sidebar ':'sidebar active'}>
        <div className="logo_content">
            <div className='logo'>
            <i className="bi bi-door-closed-fill"></i>
            <div className='logo_name'>Dahboard</div>
            </div>
            <i className="bi bi-list" id='btun' onClick={handleToggle}></i>
        </div>
        <ul className='nav_list'>
        {SidebarData.map((item,index)=>{
                return(
                    <li key={index}>
                    <a href={item.path} onClick={handleToggle}>{item.icon}
                    <span className='links_name'>{item.title}</span>
                    </a>
                    <span className='tooltip'>{item.title}</span>
                </li>);})}
        </ul>
       </div>
         
     
     
      
  );
};

export default Sidebar;
