<template>
     <div class="container">
        <div class="row align-items-center my-homepage">
            <div class="col-md-6">
                <h6 class="main-heading-light">Here for the kids</h6>
                <h6 class="sub-heading mt-4">We want each young person to find their place in the career world, or outside of it!</h6>
            </div>
            <div class="col-md-6 mt-3">
                <img class="img-homepage float-right" v-bind:src="img_home" />
            </div>
        </div>
        <router-link tag = "button" class="btn btn-wrap" to = "/field">Start my Journey</router-link>
    </div>
</template>
<script>

import img_home from '../../../public/images/homepage.png';

export default {
    name : "CombinationsComponent",
    data : function(){
        return {
            img_home : img_home
        }
    }
}
</script>

