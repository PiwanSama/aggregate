<template>
    <div class="container">
        <h2 class="my-5 sub-heading-blue">{{currentFaculty.name}}</h2>
        <div v-if = "loading">
            <fulfilling-bouncing-circle-spinner
                :animation-duration="1000"
                :size="60"
                :color="'#247BA0'"/>
        </div>
        <div v-if = "loaded">
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
    </div>
</template>

<script>

import { FulfillingBouncingCircleSpinner } from 'epic-spinners';

export default{
    name : "faculty-programs",
    components : {
        FulfillingBouncingCircleSpinner
    },
    data(){
        return{
            currentFaculty : null,
            programs : [],
            loading : true,
            loaded: false
        };
    },
    created() {
        this.loadFaculties(this.$route.params.id);
    },
    methods : {
        loadFaculties(id){
            fetch('/v1/universities/faculty/'+id+'/programs')
            .then(res => res.json())
            .then(res => {
                this.currentFaculty = res[0];
                this.loadPageData();
            });
        },
        loadPageData(){
            this.programs = this.currentFaculty.programs; 
            this.loading = false;
            this.loaded = true;
        }
    }
}

</script>