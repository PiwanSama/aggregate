<template>
    <div class="container">
       <section id="welcome">
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
       </section>
        <!--section class="mt-5">
            <h3 class="sub-heading d-flex justify-content-center">What can you do with Aggregate?</h3>
            <div class="card-group my-5">
                <div class="card mx-2">
                    <img class="card-img-top" v-bind:src="img_apply" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title sub-heading">Calculate your grades</h5>
                    <p class="card-text">Pens and calculators aside! Calculate your 'A' Level points and University admission weights, and save your grades on your Aggregate account</p>
                    </div>
                </div>
                <div class="card mx-2">
                    <img class="card-img-top" v-bind:src="img_explore" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title sub-heading">Explore universities</h5>
                    <p class="card-text">Did you know Uganda has 47 universities and over 50 tertiary institutions? Explore, bookmark and compare all your options until you find the perfect place for you</p>
                    </div>
                </div>
                <div class="card mx-2">
                    <img class="card-img-top" v-bind:src="img_scholarships" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title sub-heading">Find scholarships</h5>
                    <p class="card-text">We know times can be hard. That's why we want to guide you on all your potential funding. From Government sponsorship to loan schemes and private scholasrhips, learn how each option works and find what works for you</p>
                    </div>
                </div>
            </div>
        </section-->
    </div>
</template>
<script>

import img_home from '../../../public/images/homepage.png';
import img_one from '../../../public/images/img_card_one_2.jpg';
import img_two from '../../../public/images/img_card_two.jpg';
import img_three from '../../../public/images/img_card_three.jpg';

export default {
    name : "HomepageComponent",
    data : function(){
        return {
            img_home : img_home,
            img_apply : img_one,
            img_explore : img_two,
            img_scholarships : img_three
        }
    }
}
</script>

