<template>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card shadow p-4 my-5 col-sm-4">
            <div class="card-body">
                <h5 class="card-title sub-heading m-3 text-center">Sign up to Aggregate</h5>
                <button type="button" class="btn btn-google col my-2"><span style="margin-right: 10px;"><img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/></span>Continue with Google</button><br><br>
                <p class="text-center form-text text-muted or-text">OR</p>
                <div>
                    <div class="alert alert-danger" role="alert" v-if="formErrorsExist">
                        <div v-for="error in formErrors">
                            <small class="alert-heading">{{error[0]}}</small>
                        </div>
                    </div>
                    <form @submit.prevent="registerUser">
                        <div class="form-group">
                            <label for="inputName" class="title-sm-bold my-2">First Name</label>
                            <input v-model = "form.first_name" type="text" class="form-control" id="inputName" autocomplete="off" aria-describedby="emailHelp" placeholder="Enter First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="inputSurname" class="title-sm-bold my-2">Surname</label>
                            <input  v-model = "form.surname" type="text" class="form-control" id="inputSurname" autocomplete="off" aria-describedby="emailHelp" placeholder="Enter Surname" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="title-sm-bold my-2">Email address</label>
                            <input  v-model = "form.email" type="email" class="form-control" id="inputEmail" autocomplete="off" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="title-sm-bold my-2">Password</label>
                            <input  v-model = "form.password" type="password" class="form-control" id="inputPassword" autocomplete="off" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="title-sm-bold my-2">Confirm Password</label>
                            <input v-model = "form.password" type="password" class="form-control" id="inputPasswordConfirmation" autocomplete="off" placeholder="Confirm Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary-custom col-12 mt-4">Create Account</button>
                        </form>
                </div><br><br>
                <div v-if = "showSpinner">
                    <half-circle-spinner
                        :animation-duration="1000"
                        :size="60"
                        :color="'#247BA0'"
                    />
                </div>
            </div>
        </div>
        </div>  
    </div>

</template>

<script>

import { HalfCircleSpinner } from 'epic-spinners'
import axios from 'axios'

export default {
    name : "SignUpComponent",
    components : {
        HalfCircleSpinner
    },
    data : function(){
        return{
            form: {
                first_name : '',
                surname : '',
                email : '',
                password : ''
            },
            loading : true,
            loaded : false,
            showSpinner : false,
            formErrorsExist : false,
            formErrors : []
        }
    },
    methods : {    
        registerUser(){
            this.showSpinner = true;
            axios.post('/v1/register', this.form)
            .then(res => {
                if(res.data.status === "Failed"){
                    this.formErrors = res.data.errors;
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