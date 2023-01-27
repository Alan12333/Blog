import * as bootstrap from 'bootstrap'; 
import axios from 'axios';
import ko, { observableArray } from 'knockout';
import Swal from 'sweetalert2';



var UserModel = function(array,name,pass,mail)
{
    this.users = ko.observableArray(array);
    this.name =ko.observable(name);
    this.password =ko.observable(pass);
    this.email = ko.observable(mail);

    axios.get("/api/user/alluser").then((res)=>{
        for(let it of res.data)
        {
            this.users.push({
                "id":it.id,
                "name":it.name,
                "email":it.email
            })
        }
    });

    this.RegisterUser = function()
    {
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let form = new FormData();
        form.append("name",this.name());
        form.append("email",this.email());
        form.append("password",this.password());
        axios.post('/api/user/create', form, { 'X-CSRF-TOKEN':token }).then((res)=>{
            Swal.fire({
                icon: 'success',
                title: 'User registered',
                showConfirmButton: false,
                timer: 1500
              })
        })
    }

    this.EditUser = function()
    {
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let form = new FormData();
        form.append("name",this.name());
        form.append("email",this.email());
        form.append("password",this.password());
        axios.post('/api/user/update', form, { 'X-CSRF-TOKEN':token }).then((res)=>{
            Swal.fire({
                icon: 'success',
                title: 'User registered',
                showConfirmButton: false,
                timer: 1500
              })
        })
    }
}

ko.applyBindings(new UserModel([],"","",""))