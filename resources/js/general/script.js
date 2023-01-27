import * as bootstrap from 'bootstrap'; 
import axios from 'axios';
import ko, { observableArray } from 'knockout';



var BlogModel = function(array,array2)
{
    this.blogs = observableArray(array);
    this.lastb = observableArray(array2);
    axios.get("api/rand3").then((res)=>{
        for(let item of res.data)
        {
            let cadena = item.body;
            this.blogs.push({
                "name":item.name,
                "slug":item.slug,
                "body":cadena.substring(0,100)+"..",
                "img":item.img
            });
        }
    });
    axios.get("api/rand3").then((res)=>{
        for(let item of res.data)
        {
            let cadena = item.body;
            this.blogs.push({
                "name":item.name,
                "slug":item.slug,
                "body":cadena.substring(0,100)+"..",
                "img":item.img
            });
        }
    });
    axios.get("api/lastblogs").then((res)=>{
        for(let item of res.data)
        {
            let cadena = item.body;
            this.lastb.push({
                "name":item.name,
                "slug":item.slug,
                "body":cadena.substring(0,200)+"..",
                "img":item.img
            });
        }
    })
}
ko.applyBindings(new BlogModel([],[]));

