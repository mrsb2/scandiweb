import React, { useState } from 'react';
import './addproduct.css';
import {  Link, useNavigate } from 'react-router-dom';
import axios from 'axios';





function AddProduct() {


const renderProductInputs = () => {
    if (selectedProduct === "DVD") {
        return (
        <div className="inputContainerType">
            <div className="inputName">
            <p>Size(MB)</p>
            <input autoComplete="off" id="size" type="text" name="attribute_value" 
            value={productInfo.attribute_value} onChange={handleInputChangeDecimal}/>
            </div>
            <div className="example">
            <p>Please provide the size in Megabytes.</p>
            </div>
        </div>
        );
    } else if (selectedProduct === "Book") {
        return (
        <div className="inputContainerType">
            <div className="inputName">
            <p>Weight(KG)</p>
            <input
                autoComplete="off"
                id="weight"
                type="text"
                name="attribute_value"
                value={productInfo.attribute_value}
                onChange={handleInputChangeDecimal}
            />
            </div>
            <div className="example">
            <p>Please provide the weight in Kilograms.</p>
            </div>
        </div>
        );
    } else if (selectedProduct === "Furniture") {
        return(
            <div className='inputContainerType'>
                <div  className='inputName'>
                    <p>Height (CM)</p>
                    <input id='height' type="text" name='height' value={dimension.height} onChange={handleInputChangeDim} />
                </div>
                <div  className='inputName'>
                    <p>Width (CM)</p>
                    <input id='width' type="text" name='width' value={dimension.width} onChange={handleInputChangeDim}/>
                </div>
                <div  className='inputName'>
                    <p>Length (CM)</p>
                    <input id='length' type="text" name='length' value={dimension.length} onChange={handleInputChangeDim}/>
                </div>
                <div className='example'>
                    <p>Please provide dimensions in cm.</p>
                </div>
            </div>
        );
    } else {
        return null;
    }
    };





    const [selectedProduct, setSelectedProduct] = useState();
    const attributeTypeMap = {
        DVD: 'Size',
        Book: 'Weight',
        Furniture: 'Dimensions (HxWxL)'
    }

    const handleChange = (event) => {
        setSelectedProduct(event.target.value);
    };

    const [productInfo, setProductInfo] = useState({
        sku: '',
        name: '',
        price: '',
        type: '',
        attribute_type:'',
        attribute_value:''
    });
    
    const handleInputChange = (event) => {
        const { name, value } = event.target;
        setProductInfo(prevState => ({
            ...prevState,
            [name]: value
            
        }));
        
    };
    const handleInputChangeDecimal = (event) => {
        const { name, value } = event.target;
        const numericValue = value.replace(/[^0-9.]/g, '');
        if (numericValue !== value) {
          event.target.value = numericValue;
          event.target.style.borderColor = 'red';
        } else {
          event.target.style.borderColor = '';
        }
        setProductInfo(prevState => ({
          ...prevState,
          [name]: numericValue
        }));
      };
    

    const [dimension, setDimension] = useState({
        height: '',
        width:'',
        length:''
    });
    const handleInputChangeDim = (event) => {
        const { name, value } = event.target;
        if (!isNaN(value)) { 
            event.target.style.borderColor = ''; 
            } else {
            event.target.style.borderColor = 'red'; 
            }
        const intValue = parseInt(value);
        setDimension(prevState => ({
            ...prevState,
            [name]: isNaN(intValue) ? '' : intValue
        }));
    };
    
    const navigate = useNavigate();
    const triggerAPI =(product) => {
            axios.post('https://php.mrsomebody.space/addProducts', product)
        .then(response => {
            console.log(product);
            console.log(response);
        navigate('../');
        
        })
        .catch((error) => {
        console.log(error);
            
        });
    }
    const handleSubmit = (event) => {
        event.preventDefault();
        productInfo.type = selectedProduct;
        if(selectedProduct==="Furniture")
        {
            productInfo.attribute_value = dimension;//`${dimension.height}x${dimension.width}x${dimension.length}`
        }
        productInfo.attribute_type = attributeTypeMap[selectedProduct];
        triggerAPI(productInfo);
    }

    return (
    <div className='container'>
        <div className='headerProductList'>
            <div className='ProductList'>
                <h2>Product Add</h2>
            </div>
            
            <div className='buttonsContainer'>
                <div className='buttons'>
                    <input id='save' type='submit' form='product_form' value={'Save'}></input>
                </div>
                <div className='buttons'>
                    <Link to='/'  id='cancel'>
                        <p className='buttonsName'>Cancel</p>
                    </Link>
                </div>
            </div>
        </div>
        {/* ------------------------------------------------------------------------------------- */}
        <div className='containerAdd'>
            <form id='product_form' className='formContainer' onSubmit={handleSubmit} >
                <div  className='inputName'>
                        <p>SKU</p>
                        <input id='sku' type="text" name="sku" value={productInfo.sku} onChange={handleInputChange}  />
                    </div>
                    <div  className='inputName'>
                        <p>Name</p>
                        <input id='name' type="text" name="name" value={productInfo.name} onChange={handleInputChange} />
                    </div>
                    <div  className='inputName'>
                        <p>Price($)</p>
                        <input id='price' type="text" name="price" value={productInfo.price} onChange={handleInputChangeDecimal}pattern="\d*\.?\d*" />
                    </div>
                <div className='dropdownSwitch'>
                    <label htmlFor="product-selector">Type Switcher</label>
                    <select  id='productType' value={selectedProduct} onChange={handleChange}>
                        <option value="">Select an option</option>
                        <option value="DVD">DVD</option>
                        <option value="Book">Book</option>
                        <option value="Furniture">Furniture</option>
                    </select>
                </div>
                {renderProductInputs()}
                {/* {renderComponent()} */}
            </form>
        </div>
    </div>
    )
}
export default AddProduct
