import React, { useState, useEffect } from 'react';
import {  Link } from 'react-router-dom';
import axios from 'axios';
import './productpage.css';

function ProductCheckbox({ product }) {
    const [isChecked, setIsChecked] = useState(false);

    function handleCheckboxChange(event) {
        const { checked } = event.target;
        setIsChecked(checked);

        if (checked) {
        myFunction(true, product.id);
        }
        else{
            myFunction(false,product.id);
        }
    }

    function myFunction(boolValue, productId) {
        console.log("Bool value:", boolValue);
        console.log("Product ID:", productId);
        // Replace with your own code to perform actions based on the bool value and product ID
        
    }

    return (
        <div className='checkboxDiv'>
            <input className='delete-checkbox' type="checkbox" checked={isChecked} onChange={handleCheckboxChange} />
        </div>
    );
}

function MassDelete(){
    console.log('delete');
}

function ProductPage() {
    const [products, setProducts] = useState([]);
    useEffect(() => {
        axios.get('http://localhost/products.php')
        .then(response => {
            setProducts(response.data);
        })
        .catch(error => {
            console.log(error);
        });
    }, []);
    
    return (
    <div className='container'>
        <div className='headerProductList'>
            <div className='ProductList'>
                <h2>Product List</h2>
            </div>
            
            <div className='buttonsContainer'>
                <div className='buttons'>
                    <Link to='/add-product'  id='add-product-btn'>
                        <p className='buttonsName'>ADD</p>
                    </Link>
                </div>
                <div className='buttons'>
                    <button id='delete-product-btn' onClick={MassDelete}>
                        <p>MASS DELETE</p>
                    </button>
                </div>
            </div>
        </div>
        {/* ------------------------------------------------------------------------------------- */}
        <div className='containerProducts'>
            {products.map(product => (
            <div key={product.id} className='containerProduct'>
                <div  className='containerProduct2'>
                    <ProductCheckbox key={product.id} product={product} />
                    <p className='sku'>Sku: {product.sku}</p>
                    <p className='name'>Name:{product.name}</p>
                    <p className='price'>Price: {product.price}$</p>
                    <p className='attributes'>{product.attribute_type}: {product.attribute_value}</p>
                </div>
            </div>
            ))}
        </div>
    </div>
            
    )
}

export default ProductPage;




