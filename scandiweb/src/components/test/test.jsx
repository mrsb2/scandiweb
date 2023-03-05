import React, { useState, useEffect } from 'react';
import axios from 'axios';
import './test.css'


function Test() {
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

    console.log(products);
    return (
    <div className='container'>
        <ul>
            {products.map(product => (
            <div className='containerPost'>
            <li key={product.id}>
                <p className='sku'>SKU: {product.sku}</p>
                <p className='name'>{product.name}</p>
                <p className='price'>Price: ${product.price}</p>
                <p className='attributes'>{product.attribute_type}: {product.attribute_value} {product.attribute_unit}</p>
            </li>
            </div>
            ))}
        </ul>
    </div>
            


    )
}

export default Test;




