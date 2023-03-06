import React, { useState, useEffect } from 'react';
import './addproduct.css';
import {  Link } from 'react-router-dom';
import axios from 'axios';
import Select from 'react-select'

const addProduct = () => {

    const options = [
        { value: 'DVD', label: 'DVD' },
        { value: 'Book', label: 'Book' },
        { value: 'Furniture', label: 'Furniture' }
    ]
    
    const [selectedProductType, setSelectedProductType] = useState('DVD');

    const handleSelectChange = (event) => {
        setSelectedProductType(event.target.value);
    };











  return (
    <div className='container'>
        <div className='headerProductList'>
            <div className='ProductList'>
                <h2>Product Add</h2>
            </div>
            
            <div className='buttonsContainer'>
                <div className='buttons'>
                    <Link form='formProduct' type='submit' value='update' to='/'  id='add-product-btn'>
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
        <div className='containerAdd'>
            <form id='formProduct' className='formContainer'>
                <label>
                    <div  className='inputName'>
                        <p>SKU</p>
                        <input id='sku' type="text" sku="sku" />
                    </div>
                    <div  className='inputName'>
                        <p>Name</p>
                        <input id='name' type="text" name="name" />
                    </div>
                    <div  className='inputName'>
                        <p>Price($)</p>
                        <input id='price' type="text" price="name" />
                    </div>
                    
                </label>
                <div className='dropdownSwitch'>
                <Select id='productType' options={options} />
                </div>
                    {/* <input className='sumitBtn' type="submit" value="Submit" /> */}
            </form>
        </div>
    </div>
  )
}

export default addProduct
