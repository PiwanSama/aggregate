<template>
    <div class="container">
        <div v-if = "loading">
            <fulfilling-bouncing-circle-spinner
                :animation-duration="1000"
                :size="60"
                :color="'#247BA0'"/>
        </div>
        <div v-if = "loaded">
            <h2 class="my-5 sub-heading-blue">{{currentFaculty.name}}</h2>
            <div v-if="programs.length">
                <div class="list-group">
                    <div v-for="program in programs" v-bind:key = "program.id" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{program.name}}</h5>
                            <span><font-awesome-icon icon="fa-regular fa-bookmark"></font-awesome-icon></span>
                        </div>
                            <span class="badge badge-warning">{{ program.duration }} years</span>
                            <span class="badge badge-primary">{{program.study_time}}</span>
                            <span v-if="program.is_government_sponsored" class="badge badge-info">Government Sponsored</span>
                        </div>
                </div>
            </div>
        </div>
        <div v-if = "programsLoadedError"> 
            <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Sorry, something went wrong!</h4>
                    <p class="mb-0">We had trouble loading this information. Please try again later</p><br>
            </div>
        </div>
    </div>
</template>

<script>

import { FulfillingBouncingCircleSpinner } from 'epic-spinners'
import axios from 'axios'

export default{
    name : "faculty-programs",
    components : {
        FulfillingBouncingCircleSpinner
    },
    data(){
        return{
            currentFaculty : null,
            programs : [],
            programsLoadedError : false,
            loading : true,
            loaded: false
        };
    },
    created() {
        this.loadFaculties(this.$route.params.id);
    },
    methods : {
        loadFaculties(id){
            axios.get('/v1/universities/faculty/'+id+'/programs')
            .then(res => {
                const isNoDataAvailable = res.data[0].programs === null;
                if(isNoDataAvailable){
                    const emptyDataError = new Error('Invalid data');
                    emptyDataError.statusCode = 500;
                    throw emptyDataError;
                }else{
                    this.currentFaculty = res.data[0];
                    this.loadPageData();
                }
            })
            .catch(error => {
                console.log(error);
                this.programsLoadedError = true;
            })
            .finally(() => this.loading = false);
        },
        loadPageData(){
            this.programs = this.currentFaculty.programs; 
            this.loaded = true;
        }
    }
}

</script>