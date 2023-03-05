import React from 'react';
import './addproduct.css';
import {  Link } from 'react-router-dom';
import axios from 'axios';

const addProduct = () => {
  return (
    <div className='container'>
        <div className='headerProductList'>
            <div className='ProductList'>
                <h2>Product Add</h2>
            </div>
            
            <div className='buttonsContainer'>
                <div className='buttons'>
                    <Link to='/'  id='add-product-btn'>
                        <p className='buttonsName'>Save</p>
                    </Link>
                </div>
                <div className='buttons'>
                    <Link to='/'  id='add-product-btn'>
                        <p className='buttonsName'>Save</p>
                    </Link>
                </div>
            </div>
        </div>
        {/* ------------------------------------------------------------------------------------- */}
        <div className='containerProducts'>
        
        </div>
    </div>
  )
}

export default addProduct
