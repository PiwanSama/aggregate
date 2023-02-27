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
                    <form>
                        <div class="form-group">
                            <label for="inputEmail" class="title-sm-bold my-2">Email address</label>
                            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="title-sm-bold my-2">Password</label>
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
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