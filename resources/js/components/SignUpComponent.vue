<template>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card shadow p-4 my-5 col-sm-4">
            <div class="card-body">
                <h5 class="card-title sub-heading m-3 text-center">Sign up to Aggregate</h5>
                <button type="button" class="btn btn-google col my-2"><span style="margin-right: 10px;"><img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/></span>Continue with Google</button><br><br>
                <p class="text-center form-text text-muted or-text">OR</p>
                <div>
                    <form>
                        <div class="form-group">
                            <label for="inputEmail" class="title-sm-bold my-2">Email address</label>
                            <input type="email" class="form-control" id="inputEmail" autocomplete="off" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="title-sm-bold my-2">Password</label>
                            <input type="password" class="form-control" id="inputPassword" autocomplete="off" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="title-sm-bold my-2">Confirm Password</label>
                            <input type="password" class="form-control" id="inputPasswordConfirmation" autocomplete="off" placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-primary-custom col-12 mt-4">Create Account</button>
                        </form>
                </div><br><br>
            </div>
        </div>
        </div>  
    </div>

</template>