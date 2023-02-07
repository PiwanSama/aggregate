<template>
    <div class="container">
       <section id="welcome">
            <div class="row align-items-center my-homepage">
                <div class="col-md-6">
                    <h6 class="main-heading">Here for the kids.</h6>
                    <h6 class="sub-heading mt-4">We want each young person to find their place in the career world, or outside of it!</h6>
                    <router-link tag = "button" class="btn btn-primary-custom btn-wrap" to = "/a-level-points">Start my Journey</router-link>
                </div>
                <div class="col-md-6 mt-3">
                    <img class="img-homepage float-right" v-bind:src="img_home" />
                </div>
            </div>
       </section>
    </div>
</template>
<script>

import img_home from '../../../public/images/undraw.png';

export default {
    name : "HomepageComponent",
    data : function(){
        return {
            img_home : img_home
        }
    }
}
</script>

