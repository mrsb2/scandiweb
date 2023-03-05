import './App.css';
import {FooterComponent} from './components';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { AddProduct, ProductPage } from './page';

function App() {
  return (
    <div className="App">
      
      <BrowserRouter>
        <Routes>
            <Route path="/" element={<ProductPage />} />
            <Route path="/add-product" element={<AddProduct />} />
        </Routes>
        </BrowserRouter>
        <FooterComponent/>
    </div>
  );
}

export default App;
