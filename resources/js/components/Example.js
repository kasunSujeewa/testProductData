import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';

const Example = (props) => {

const products = JSON.parse(props.products);

const [allproducts, setallproducts] = useState([]);

const [searchName, setsearchName] = useState('');

useEffect(() => {
    if(products){
        setallproducts(products);
    }
}, []);

useEffect(() => {
    if(products && searchName){
        const filteredProducts = products.filter((item) => {
            if(item.name.includes(searchName)){
               return item
            }
            else if(item.author_name.includes(searchName)){
                return item
            }
         } )
        setallproducts(filteredProducts);
        console.log(filteredProducts);
    }
}, [searchName]);

console.log(typeof allproducts,allproducts);
console.log(searchName);


    return (
        <div>
        <input type="text" name='search'  onChange={(data) => console.log(data)}/>
        {!!allproducts.length && allproducts.map((item, i) => (
            <div className="card" key={item.id} >
                <div className="card-header">{item.name}</div>

                <div className="card-body" >
                    <div className="name-auther">
                        <span>Created By : {item.author_name}</span>
                        
                    </div>
                    <div className="created-date">
                        <span>Created At :  {item.created_date}</span>
                       

                    </div>
                    <div className="price" onClick={() => console.log('hii')}>
                        <span >Price:  {item.price}</span>
                    </div>
                   
                </div>
            </div>   
            
            ))
            
        }
        </div>
        
    );
}

export default Example;

if (document.getElementById('header')) {
    const el = document.getElementById('header')
    const props = Object.assign({}, el.dataset)
    ReactDOM.render(<Example {...props} />, el);
}
