import React,{useState} from 'react'
import BtnSlider from './BtnSlider'

import './Slider.css'
const dataSlider=[
    {
        id:'slider1',
        title:'Welcome to NeonSigne',
        path:'storage/public/img/sweetdreams.jpg'
    },
    {
        id:'slider2',
        title:'We are here For You',
        path:'storage/public/img/background.jpg'
    },
    {
        id:'slider3',
        title:'Decorate Your House',
        path:'storage/public/img/sweetdreams.jpg'
    },
    {
        id:'slider4',
        title:'Decorate Your Office',
        path:'storage/public/img/sweetdreams.jpg'
    }
]

function Slider() {
    const [slideIndex,setSlideIndex]=useState(1);
    const nextSlide=()=>{
        if (slideIndex!==dataSlider.length) {
            setSlideIndex(slideIndex+1);
        }
        else if(slideIndex===dataSlider.length){
            setSlideIndex(1);
        }
    }
    const prevSlide=()=>{
        if (slideIndex!==1) {
            setSlideIndex(slideIndex-1);
        }
        else if(slideIndex===1){
            setSlideIndex(dataSlider.length);
        }
    }
  return (
    <div className='container-slider'>
        {dataSlider.map((obj,index)=>{
            return <div key={obj.id} className={slideIndex===index +1 ?'slide active-anim':'slide'}>
                <h1>{obj.title}</h1>
    <img src={obj.path} alt="First slide"/>
</div>
        })}
       
<BtnSlider moveSlide={nextSlide} direction={'next'}/>
<BtnSlider moveSlide={prevSlide} direction={'prev '}/>
<div className="container-dots">
                {Array.from({length: 5}).map((item, index) => (
                    <div 
                    onClick={() => moveDot(index + 1)}
                    className={slideIndex === index + 1 ? "dot active" : "dot"}
                    ></div>
                ))}
</div>
 </div> 

  )
}

export default Slider