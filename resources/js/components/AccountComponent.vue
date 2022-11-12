<template>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card shadow p-4 my-5 col-sm-6">
            <div class="card-body">
                <h5 class="card-title sub-heading m-3 text-center">Hello there!</h5>
                <h6 class="card-subtitle m-3 subtitle text-center">Welcome back to your account</h6>
                <button type="button" class="btn btn-primary-custom col-12">Continue with Google<span style="margin-left: 10px;"><font-awesome-icon icon="fa-brands fa-google" /></span></button><br><br>
                <p class="text-center form-text text-muted">OR</p>
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
                        <button type="submit" class="btn btn-primary-custom col-12 my-4">Login</button>
                        </form>

                </div><br><br>
                <p class="text-center text-muted">Not registered yet? Sign up <router-link to = "#">here</router-link></p>
            </div>
        </div>
        </div>  
    </div>

</template>