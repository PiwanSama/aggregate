<template>
    <div class="container">
        <div v-if = "loading">
            <fulfilling-bouncing-circle-spinner
                :animation-duration="1000"
                :size="60"
                :color="'#247BA0'"/>
        </div>
        <div v-if = "loaded">
            <div>
                <img id = "header" class = "img-header" v-bind:src= "this.universityHeaderUrl" />
                <div id = "universityCard" class="card-blue shadow mb-5 col-sm-4">
                    <div class="row">
                        <img class = "col-2 img-card-blue" v-bind:src= "this.universityBadgeUrl" />
                        <div class="card-body col-10">
                            <h5 class="card-title card-heading-white mt-2">{{this.currentUniversity.details.uni_name}}</h5>
                            <h6 class="card-subtitle card-subheading-white my-3">{{this.currentUniversity.details.uni_motto}}</h6>
                        </div>
                    </div>
                </div>
                <section id="topSection">
                    <h3 class="sub-heading-blue my-3">About {{ currentUniversity.details.uni_name }}</h3>
                    <p class="my-3">{{ currentUniversity.details.uni_details }}</p>
                </section>
                <section  id="aboutSection">
                    <h3 class="sub-heading-blue">Colleges and Faculties</h3>
                    <div class="row justify-content-around" v-for="group in loadFaculties">
                    <div v-for="faculty in group" v-bind:key = "faculty.id" class="card shadow p-2 my-2 col-sm-3">
                        <div v-if = "faculty.name" class="card-body">
                            <h5 class="card-title my-3">{{faculty.name}}</h5>
                        </div>
                    </div>
                </div>
                </section>
                <section  id="aboutSection">
                    <h3 class="sub-heading-blue">Tuition and Aid</h3>
                    <div class="row justify-content-around" v-for="group in loadScholarships">
                    <div v-for="scholarship in group" v-bind:key = "scholarship.id" class="card shadow p-2 m-2 col-sm-5">
                        <div v-if = "scholarship.name" class="card-body">
                            <h5 class="card-title subtitle my-3">{{scholarship.name}}</h5>
                            <h6 class="card-subtitle mb-2">{{scholarship.details}}</h6>
                            <div v-if="scholarship.website_url">
                                <span class="mx-2"><font-awesome-icon icon="fa-solid fa-globe"></font-awesome-icon></span>
                                <span><a class = "website-link" target="_blank" rel="noopener noreferrer" :href="scholarship.website_url">Visit Website</a></span>
                            </div>
                            <div v-if="scholarship.contact">
                                <span class="mx-2"><font-awesome-icon icon="fa-solid fa-phone"></font-awesome-icon></span>
                                <span>{{scholarship.contact}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            </div>

        </div>
    </div>
</template>

<script>


import { FulfillingBouncingCircleSpinner } from 'epic-spinners';

export default{
    name : "university-profile",
    components : {
        FulfillingBouncingCircleSpinner
    },
    data(){
        return{
            currentUniversity : null,
            universityHeader : null,
            universityBadge : null,
            universityHeaderUrl : "",
            universityBadgeUrl : "",
            facultiesArray : [],
            scholarshipsArray : [],
            loading : true,
            loaded : false
        }
    },
    created(){
        this.loadUniversityProfile(this.$route.params.id);
    },
    methods : {
        loadUniversityProfile(id){
            fetch('/v1/universities/'+id)
            .then(res => res.json())
            .then(res => {
                this.currentUniversity = res[0];
                this.loadPageData();
            });
        },
        loadPageData(){
            this.loaded = true;
            this.universityBadge = this.currentUniversity.details.uni_badge_url;
            this.universityHeader = this.currentUniversity.details.uni_header_url;
            this.facultiesArray = this.currentUniversity.faculties;
            this.scholarshipsArray = this.currentUniversity.scholarships;

            this.universityBadgeUrl = '/images/badges/'+this.universityBadge;
            this.universityHeaderUrl = '/images/headers/'+this.universityHeader;

            this.loading = false;
        }
    },
    computed : {
        loadFaculties(){
            return _.chunk(this.facultiesArray, 3); 
        },
        loadScholarships(){
            return _.chunk(this.scholarshipsArray, 2); 
        }
    }
}

</script>
