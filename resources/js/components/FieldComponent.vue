<template>
     <div class="container">
        <h2 class="my-5 main-heading">What's your field?</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow p-4 mb-5 col-sm-4 mx-auto" style="width: 18rem;">
                    <img class="card-img-top" v-bind:src="img_arts" alt="Arts image">
                    <div class="card-body">
                        <p class="card-text text-center sub-heading">Arts</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow p-4 mb-5 col-sm-4 mx-auto" style="width: 18rem;">
                    <img class="card-img-top" v-bind:src="img_sciences" alt="Sciences image">
                    <div class="card-body">
                        <p class="card-text text-center sub-heading">Sciences</p>
                    </div>
                </div>
            </div>
        </div>
        <router-link tag = "button" class="btn btn-wrap" to = "/combination">Next</router-link>
    </div>
</template>
<script>

import img_arts from '../../../public/images/apple.gif';
import img_sciences from '../../../public/images/physics.gif';

export default {
    name : "FieldComponent",
    data : function(){
        return {
            img_arts : img_arts,
            img_sciences : img_sciences
        }
    }
}
</script>

