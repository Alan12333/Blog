import * as bootstrap from 'bootstrap'; 
import axios from 'axios';
import ko from 'knockout';

var BlogModel=function(items,search)
{
    this.prod = ko.observableArray(items);
    this.search = ko.observable(search);

    axios.get("/api/all").then((res)=>{
        console.log(res.data)
        for(let it of res.data)
        {
            let cadena = it.body;
            this.prod.push({
                "id":it.id,
                "name":it.name,
                "slug":it.slug,
                "body":cadena.substring(0,60)+"..",
                "img":it.img
            })
        }
    });

    this.SearchbyName = function()
    {
        this.prod.removeAll();
        let form = new FormData();
        form.append("name",this.search());
        let token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
        axios({method:"POST",url:"/api/byname",data:form,headers:{"X-CSRF-TOKEN":token}}).then((res)=>{
            
            for(let it of res.data)
            {
                let cadena = it.body;
                this.prod.push({
                    "id":it.id,
                    "name":it.name,
                    "slug":it.slug,
                    "body":cadena.substring(0,75)+"..",
                    "img":it.img
                })
            }
        });
    }
    
}

ko.applyBindings(new BlogModel([],"",0));