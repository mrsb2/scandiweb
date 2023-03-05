import './App.css';
import {Testprod, FooterComponent} from './components';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { AddProduct } from './page';

function App() {
  return (
    <div className="App">
      
      <BrowserRouter>
        <Routes>
            <Route path="/" element={<Testprod />} />
            <Route path="/add-product" element={<AddProduct />} />
        </Routes>
        </BrowserRouter>
        <FooterComponent/>
    </div>
  );
}

export default App;
