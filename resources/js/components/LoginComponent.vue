<template>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card shadow p-4 my-5 col-sm-4">
            <div class="card-body">
                <h5 class="card-title sub-heading m-3 text-center">Log In!</h5>
                <p class="text-center text-muted my-2">Not registered yet? Sign up <router-link :to = "{
                    name : 'Signup'
                }">
                here</router-link></p>
                <button type="button" class="btn btn-google col my-2"><span style="margin-right: 10px;"><img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/></span>Continue with Google</button><br><br>
                <p class="text-center form-text text-muted or-text">OR</p>
                <div>
                    <div class="alert alert-danger" role="alert" v-if="formErrorsExist">
                        <div v-for="error in formErrors">
                            <small class="alert-heading">{{error[0]}}</small>
                        </div>
                        <div v-if="errorMessage">
                            <small class="alert-heading">{{errorMessage}}</small>
                        </div>
                    </div>
                    <form  @submit.prevent="loginUser">
                        <div class="form-group">
                            <label for="inputEmail" class="title-sm-bold my-2">Email address</label>
                            <input type="email" class="form-control" v-model="form.email" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="title-sm-bold my-2">Password</label>
                            <input type="password" class="form-control" v-model="form.password" id="inputPassword" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary-custom col-12 mt-4">Login</button>
                        </form>

                </div><br><br>
                <!--p class="text-center text-muted"><router-link to = "#">Forgot Password?</router-link></p-->
            </div>
        </div>
        </div>  
    </div>

</template>

<script>

import { HalfCircleSpinner } from 'epic-spinners'
import axios from 'axios'

export default {
    name : "LoginComponent",
    components : {
        HalfCircleSpinner
    },
    data : function(){
        return{
            form: {
                email : '',
                password : ''
            },
            errorMessage : '',
            loading : true,
            loaded : false,
            showSpinner : false,
            formErrorsExist : false,
            formErrors : []
        }
    },
    methods : {    
        loginUser(){
            this.showSpinner = true;
            axios.get('/sanctum/csrf-cookie').then(response => {
            axios.post('/v1/login', this.form)
            .then(res => {
                if(res.data.status === "Failed"){
                    this.formErrors = res.data.errors;
                    this.errorMessage = res.data.message;
                    this.formErrorsExist = true;
                }
            })
            .catch(function (error) {
                
            })
            .finally(() => this.showSpinner = false);
        });
        axios.post('/v1/login', this.form)
        .then(res => {
            if(res.data.status === "Failed"){
                this.formErrors = res.data.errors;
                this.errorMessage = res.data.message;
                this.formErrorsExist = true;
            }
        })
        .catch(function (error) {
            
        })
        .finally(() => this.showSpinner = false);
    }
  }
}

</script>