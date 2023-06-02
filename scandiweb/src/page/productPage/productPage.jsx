import React, { useState, useEffect } from 'react';
import {  Link } from 'react-router-dom';
import axios from 'axios';
import './productpage.css';




function ProductPage() {
    
    const [checkedIds, setCheckedIds] = useState([]);
    const deleteProducts = async (productIds) => {
    
        try {
        const response = await axios.post('https://php.mrsomebody.space/delProducts', { productIds });
        window.location.reload();
        console.log(response);
        } catch (error) {
        console.error(error);
        }
    };



    function handleCheckboxChange(event, product) {
        const { checked } = event.target;

        if (checked) {
        setCheckedIds((prevState) => [...prevState, product.id]);
        } else {
        setCheckedIds((prevState) =>
            prevState.filter((id) => id !== product.id)
        );
        }
    }

    function handleDelete() {
        deleteProducts(checkedIds)
        
    }

    const [products, setProducts] = useState([]);
    useEffect(() => {
        axios.get('https://php.mrsomebody.space/getProducts')
        .then(response => {
            setProducts(response.data);
            console.log(response);
        })
        .catch(error => {
            console.log(error);
        });
    }, []);
    //console.log(products);
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
                    <button id='delete-product-btn' onClick={handleDelete}>
                        <p>MASS DELETE</p>
                    </button>
                </div>
            </div>
        </div>
        {/* ------------------------------------------------------------------------------------- */}
        <div className='containerProducts'>
            {Array.isArray(products) ? (
                products.map(product => (
                    <div key={product.id} className='containerProduct'>
                        <div  className='containerProduct2'>
                            <div className='checkboxDiv'>
                                <input className='delete-checkbox' type="checkbox" onChange={(event) => handleCheckboxChange(event, product)} />
                            </div>
                            <p className='sku'>Sku: {product.sku}</p>
                            <p className='name'>Name:{product.name}</p>
                            <p className='price'>Price: {product.price}$</p>
                            <p className='attributes'>{product.attribute_type}: {product.attribute_value}</p>
                        </div>
                    </div>
                ))
            ) : (
                <p>No products found.</p>
            )}
        </div>

    </div>
            
    )
}

export default ProductPage;




