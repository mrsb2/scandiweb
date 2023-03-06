import React, { useState, useEffect } from 'react';
import './addproduct.css';
import {  Link } from 'react-router-dom';
import axios from 'axios';
import Select from 'react-select'







const DVD = () =>{
    return(
        <div className='inputContainerType'>
            <div  className='inputName'>
                <p>Size(MB)</p>
                <input id='size' type="text" size="sku" />
            </div>
        </div>
    )
}








function AddProduct() {


    const [selectedProduct, setSelectedProduct] = useState();

    const handleChange = (event) => {
      setSelectedProduct(event.target.value);
    };
  
    const renderComponent = () => {
      switch (selectedProduct) {
        case "DVD":
          return <DVD/>
        case "Book":
          return <p>book</p>;
        case "Furniture":
          return <p>fu</p>;
        default:
          return null;
      }
    };
    
    console.log(selectedProduct);

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
                        <p className='buttonsName'>Cancel</p>
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
                        <input id='sku' type="text"  />
                    </div>
                    <div  className='inputName'>
                        <p>Name</p>
                        <input id='name' type="text"  />
                    </div>
                    <div  className='inputName'>
                        <p>Price($)</p>
                        <input id='price' type="text"  />
                    </div>
                    
                </label>
                <div className='dropdownSwitch'>
                <label htmlFor="product-selector">Type Switcher</label>
                    <select  id='productType' value={selectedProduct} onChange={handleChange}>
                        <option value="">Select an option</option>
                        <option value="DVD">DVD</option>
                        <option value="Book">Book</option>
                        <option value="Furniture">Furniture</option>
                    </select>
                    
                </div>
                {renderComponent()}
            </form>
        </div>
    </div>
    )
}

export default AddProduct
