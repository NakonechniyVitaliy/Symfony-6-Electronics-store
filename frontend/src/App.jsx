import './App.css'
import data from './data.json'


function App() {

  return (
    <div className="App">
        {data.map((product) => (
            <ul key={product.id}>
                <li>Name: {product.name}</li>
                <li>Price: {product.price}</li>
                <li>Category: {product.category}</li>
                <li>Stock: {product.stock}</li>
            </ul>
        ))}
    </div>
  )
}

export default App
