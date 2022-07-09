import React from 'react'
import './Slider.css'

function BtnSlider({direction,moveSlide}) {
  return (
    <button onClick={moveSlide} className={direction==="next"?'btn-slide next':'btn-slide prev'}>
        
        <i className={direction==="next"?"bi bi-arrow-right":"bi bi-arrow-left"}></i>
    </button>
  )
}

export default BtnSlider