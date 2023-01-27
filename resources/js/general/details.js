import * as bootstrap from 'bootstrap'; 
import axios from 'axios';
import ko, { observable, observableArray } from 'knockout';

let local = window.location.toString();
let id = local.split("/");



var BlogModel = function(array,array2,id)
{
    this.blogs = observableArray(array);
    this.comments = observableArray(array2);
    this.id = observable(id);

    axios.get("/api/rand3").then((res)=>{
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
    axios.get("/api/post/getcomment/"+this.id()).then((res)=>{
        console.log(res.data)
        for(let item of res.data)
        {
            this.comments.push({
                "id":item.id,
                "comment":item.comment,
                "email":item.email,
                "creacion":item.created_at,
                "post_id":item.post_id
            });
            setTimeout(() => {
                
                console.log(this.comments())
            }, 1000);
        }
    });
}
ko.applyBindings(new BlogModel([],[],id[id.length-1]));

