import React, { useState, useEffect } from 'react';
import axios from 'axios';


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
    <div>
      <h1>Product List</h1>
      <ul>
        {products.map(product => (
          <li key={product.id}>
            <h2>{product.name}</h2>
            <p>SKU: {product.sku}</p>
            <p>Price: ${product.price}</p>
            <p>{product.attribute_type}: {product.attribute_value} {product.attribute_unit}</p>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Test;