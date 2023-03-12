<template>
    <div class="uni-profile pb-4">
    <div class="container">
        <div v-if = "loading">
            <fulfilling-bouncing-circle-spinner
                :animation-duration="1000"
                :size="60"
                :color="'#247BA0'"/>
        </div>
        <div v-if = "loaded">
                <img id = "header" class = "img-header" :src= "getHeaderLogo(currentUniversity.details.uni_header_url)" />
                <div id = "universityCard" class="card-blue shadow mb-5 col-sm-4">
                    <div class="row">
                        <img class = "col-sm-3 img-card-blue" :src= "getBadgeLogo(currentUniversity.details.uni_badge_url)" />
                        <div class="card-body col-sm-8">
                            <h5 class="card-title card-heading-white mt-2">{{currentUniversity.details.uni_name}}</h5>
                            <h6 class="card-subtitle card-subheading-white my-3">{{currentUniversity.details.uni_motto}}</h6>
                        </div>
                    </div>
                </div>
                <section id="headerSection">
                    <h3 class="card-title sub-heading-blue">About {{ currentUniversity.details.uni_name }}</h3>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="my-3">{{ currentUniversity.details.uni_details }}</p>
                        </div>
                    </div>
                </section>
                <section  id="facultySection">
                    <div>
                        <div class="card-body">
                            <h3 class="card-title sub-heading-blue">Colleges and Faculties</h3>
                            <div class="row justify-content-around" v-for="group in loadFaculties">
                                <div v-for="faculty in group" v-bind:key = "faculty.id" class="card card-bordered p-2 my-2 col-sm-3">
                                    <div v-if = "faculty.name" class="card-body">
                                        <h5 class="subtitle-sm hlink my-3">{{faculty.name}}</h5>
                                        <router-link
                                            :to = "{
                                                name : 'FacultyPrograms',
                                                params : {
                                                    id: faculty.id,
                                                    uniName : currentUniversity.details.uni_name
                                                }
                                            }">
                                            <button type="button" class="btn btn-info btn-sm">View Courses</button>
                                        </router-link>                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section  id="scholarshipSection">
                    <h3 class="sub-heading-blue">Tuition and Aid</h3>
                    <h3 class="sub-heading-grey">1. Government Scholarships</h3>
                    <div class="row mt-3">
                        <div class="col-md-3 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="subtitle text-center">Government Scholarship</h5>
                                    <h6 class="card-subtitle text-center mb-2">Granted to students who excel academically for a course qualifed</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="card ">
                                <div class="card-body">
                                    <h5 class="subtitle text-center">Sports Scholarship</h5>
                                    <h6 class="card-subtitle text-center mb-2">Granted to students who have excelled in Sports activites</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="card ">
                                <div class="card-body">
                                    <h5 class="subtitle text-center">District Quota Scholarship</h5>
                                    <h6 class="card-subtitle text-center mb-2">Granted to students who have excelled in their district of origin</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="subtitle text-center">Loan Scheme</h5>
                                    <h6 class="card-subtitle text-center mb-2">A student load payable to the government once employed</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="sub-heading-grey mt-4">2. Private Sponsorship</h3>
                    <div class="row justify-content-around mt-3">
                        <div class="col-sm-5 mt-2">
                            <button type="button" class="btn btn-info btn-lg">Download 2022 Undergraduate Fees Structure</button>
                        </div>
                        <div class="col-sm-5 mt-2">
                            <button type="button" class="btn btn-info btn-lg">Download 2022 Postgraduate Fees Structure</button>
                        </div>
                    </div>
                    <h3 class="sub-heading-grey mt-3">3. Scholarship Programs</h3>
                    <div class="row m-3 justify-content-between" v-for="group in loadScholarships">
                        <div v-for="scholarship in group" v-bind:key = "scholarship.id" class="card p-3 m-2 col-sm-5">
                            <div v-if = "scholarship.name" class="card-body">
                                <h5 class="subtitle">{{scholarship.name}}</h5>
                                <p class="card-subtitle">{{scholarship.details}}</p>
                                <div class="my-2" v-if="scholarship.website_url">
                                    <span class="my-2"><font-awesome-icon icon="fa-solid fa-circle-info"></font-awesome-icon></span>
                                    <span><a class = "website-link" target="_blank" rel="noopener noreferrer" :href="scholarship.website_url">Visit Website</a></span>
                                </div>
                                <div class="my-2" v-if="scholarship.contact">
                                    <span class="my-2"><font-awesome-icon icon="fa-solid fa-phone"></font-awesome-icon></span>
                                    <span>{{scholarship.contact}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section  id="servicesSection">
                    <h3 class="sub-heading-blue">Digital Student Support</h3>
                    <div class="row m-2" v-for="group in loadServices">
                        <div v-for="service in group" v-bind:key = "service.id" class="card col-sm-3 p-2 m-2">
                            <div v-if = "service.name" class="card-body row">
                                <div class="col-3">
                                    <img class="img-icon img-reponsive" :src="getServiceLogo(service.icon_url)"/>
                                </div>
                                <div class="col-9">
                                    <h5 class="card-title my-3">{{service.name}}</h5>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </section>
                <section  id="learningSection">
                    <h3 class="sub-heading-blue">Student Learning Programs</h3>
                    <div class="row justify-content-between m-2" v-for="group in loadPrograms">
                        <div v-for="program in group" v-bind:key = "program.id" class="card p-2 m-2 col-sm-5">
                            <div v-if = "program.name" class="card-body">
                               <div class="row">
                                <div class="col-md-3 mt-2">
                                    <img class="img-icon" :src="getProgramLogo(program.logo_url)"/>
                                </div>
                                <div class="col-md-9">
                                    <h5 class="subtitle my-3">{{program.name}}</h5>
                                    <p class="card-subtitle mb-2">{{program.description}}</p>
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="mapSection">
                    <h3 class="sub-heading-blue">Location</h3>
                    <img class="mapHolder" :src="imgMap" />
                </section>
                <section  id="aboutLocationSection">
                    <h3 class="sub-heading-blue">About {{ currentUniversity.district.name }}</h3>
                    <div class="card">
                        <div class="card-body">
                            <p class="card-subtitle">Etiam cursus felis sed nulla dapibus accumsan. Phasellus consequat, massa id facilisis placerat, odio enim imperdiet mauris, eget imperdiet erat dolor non neque. Nullam luctus laoreet feugiat. Pellentesque quis commodo enim, in facilisis nisl. Aenean ultricies leo vitae finibus gravida. Cras at augue in risus eleifend efficitur sit amet non nulla. Vivamus non euismod augue, vel interdum mauris. Nam at magna elit. Donec malesuada dolor odio, ac congue lorem suscipit nec. Aenean sit amet turpis velit. Sed scelerisque ullamcorper erat vel aliquet. Suspendisse aliquet metus metus, vel aliquet ipsum imperdiet eget. Nullam interdum magna neque, at finibus tortor ultrices sit amet.</p>
                        </div>
                    </div>
                </section>
                <section id="contactSection">
                    <h3 class="sub-heading-blue">Online Presence</h3>
                    <div class="row justify-content-start m-2">
                        <div class="col" v-if="currentUniversity.details.uni_website">
                            <a target="_blank" rel="noopener noreferrer" class="icon-link" :href="currentUniversity.details.uni_website"><font-awesome-icon icon="fa-solid fa-circle-info" size="3x"></font-awesome-icon></a>
                        </div>
                        <div class="col" v-if="currentUniversity.details.twitter_url">
                            <a target="_blank" rel="noopener noreferrer" class="icon-link" :href="currentUniversity.details.twitter_url"><font-awesome-icon icon="fa-brands fa-square-twitter" size="3x"></font-awesome-icon></a>
                        </div>
                        <div class="col" v-if="currentUniversity.details.instagram_url">
                            <a target="_blank" rel="noopener noreferrer" class="icon-link" :href="currentUniversity.details.instagram_url"><font-awesome-icon icon="fa-brands fa-square-instagram" size="3x"></font-awesome-icon></a>
                        </div>
                        <div class="col" v-if="currentUniversity.details.linkedin_url">
                            <a target="_blank" rel="noopener noreferrer" class="icon-link" :href="currentUniversity.details.linkedin_url"><font-awesome-icon icon="fa-brands fa-linkedin" size="3x"></font-awesome-icon></a>
                        </div>
                        <div class="col" v-if="currentUniversity.details.facebook_url">
                            <a target="_blank" rel="noopener noreferrer" class="icon-link" :href="currentUniversity.details.facebook_url"><font-awesome-icon icon="fa-brands fa-square-facebook" size="3x"></font-awesome-icon></a>
                        </div>
                    </div>
                </section>
                <section id="addressSection">
                    <h3 class="sub-heading-blue">Address</h3>
                    <div class="card">
                        <div class="card-body">
                            <p class="card-subtitle address">{{currentUniversity.details.uni_address}}</p>
                        </div>
                    </div>
                </section>
        </div>
        <div v-if = "dataLoadedError"> 
            <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Sorry, something went wrong!</h4>
                    <p class="mb-0">We had trouble loading this information. Please try again later</p><br>
            </div>
        </div>
    </div>
    </div>
</template>

<style scoped>
 
 a{
    text-decoration: none;
 }

 h5.hlink:hover{
    font-weight: 700;
 }

</style>
<script>


import { FulfillingBouncingCircleSpinner } from 'epic-spinners';
import img_map from '../../../public/images/map.png';
import axios from 'axios'

export default{
    name : "university-profile",
    components : {
        FulfillingBouncingCircleSpinner
    },
    data(){
        return{
            currentUniversity : null,
            facultiesArray : [],
            scholarshipsArray : [],
            servicesArray : [],
            programsArray : [],
            loading : true,
            loaded : false,
            dataLoadedError : false,
            imgMap : img_map
        }
    },
    created(){
        this.loadUniversityProfile(this.$route.params.id);
    },
    methods : {
        loadUniversityProfile(id){
            axios.get('/v1/universities/'+id)
            .then(res => {
                const isNoDataAvailable = res.data[0].details === null;
                if(isNoDataAvailable){
                    const emptyDataError = new Error('Invalid data');
                    emptyDataError.statusCode = 500;
                    throw emptyDataError;
                }else{
                    this.currentUniversity = res.data[0];
                    this.loadPageData();
                }
            })
            .catch(error => {
                console.log(error);
                this.dataLoadedError = true;
            })
            .finally(() => {
                this.loading = false;
                this.dataLoadedError = true
            });
        },
        loadPageData(){
            this.facultiesArray = this.currentUniversity.faculties;
            this.scholarshipsArray = this.currentUniversity.scholarships;
            this.servicesArray = this.currentUniversity.services;
            this.programsArray = this.currentUniversity.programs;
            this.loading = false;
            this.loaded = true;
        },
        getBadgeLogo(imagePath) {
            return '/images/badges/'+imagePath;
        },
        getHeaderLogo(imagePath) {
            return '/images/headers/'+imagePath;
        },
        getProgramLogo(imagePath) {
            return '/images/clubs/'+imagePath;
        },
        getServiceLogo(imagePath) {
            return '/images/icons/'+imagePath;
        }
    },
    computed : {
        loadFaculties(){
            return _.chunk(this.facultiesArray, 3); 
        },
        loadScholarships(){
            return _.chunk(this.scholarshipsArray, 2); 
        },
        loadServices(){
            return _.chunk(this.servicesArray, 2); 
        },
        loadPrograms(){
            return _.chunk(this.programsArray, 2); 
        }
    }
}

</script>
