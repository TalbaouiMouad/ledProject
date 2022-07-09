import React from 'react'

export const Footer = () => {
    const FooterFData=[
        {
            title:'About Us',
            path:'/aboutUs',
            cName:'fText'
        },
        {
            title:'Contact Us',
            path:'/contactus',
            cName:'fText'
        },
        {
            title:'FAQ',
            path:'/faq',
            cName:'fText'
        }
    ]
    const FooterSData=[
        {
            title:'Privacy',
            path:'/privacy',
            cName:'fText'
        },
        {
            title:'Terms & Conditions',
            path:'/terms&conditions',
            cName:'fText'
        },
        {
            title:'Return Policy',
            path:'/returnpolicy ',
            cName:'fText'
        }
    ]
    const FooterAdressData=[
        
        {
            title:'LedProject',
            adress:'1er étage, Avenue des FAR, Tour des habous, Casablanca 20000',
            cName:'fText'
        }
    ]
    const FooterContactData=[
        
        {
            title:'ContactInfo',
            email:'mailto:talbaouimouad@gmail.com',
            phoneNumber:'"tel://+212687049050',
            facebook:'https://www.facebook.com/',
            instagram:'https://www.instagram.com/',
            cName:'fText'
        }
    ]
  return (
    <div className='fContainer'>
        <h1>LedProject</h1>
        <div className='row p-2 m-0'>
            <div className='col'>
                <ul className='fGroupList'>
                {FooterFData.map((obj,index)=>{
                   return <li key={index} className='fList'><a className={obj.cName} href={obj.path}>{obj.title}</a></li>
                })}
                </ul>
            </div>
            <div className='col'>
            <ul className='fGroupList'>
                {FooterSData.map((obj,index)=>{
                   return <li key={index} className='fList'><a className={obj.cName} href={obj.path}>{obj.title}</a></li>
                })}
                </ul>
            </div>
            <div className='col'>
            
                {FooterAdressData.map((obj)=>{
                   return <div  className='fparagraphe'><h6>{obj.title}</h6><p>{obj.adress}</p></div>
                })}
                
            </div>
            <div className='col'>
            
                {FooterContactData.map((obj)=>{
                   return <div className='fparagraphe'><h6>{obj.title}</h6>
                   <p><strong>email:</strong><a href={obj.email}>talbaouimouad@gmail.com</a></p>
                   <p><strong>phoneNumber:</strong> <a href={obj.phoneNumber}>+212 687049050</a></p>
                   <p><a href={obj.facebook}><i className="bi bi-facebook"></i></a><a href={obj.instagram}><i className="bi bi-instagram"></i></a></p>
                   </div>
                })}
              
            </div>
            

        </div>
        <p className='text-center'>Copyright © 2022 ProjectLed®, All rights reserved.</p>
    </div>
  )
}
