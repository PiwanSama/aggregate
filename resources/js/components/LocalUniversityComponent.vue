<template>
    <div class="container">
        <h2 class="my-5 sub-heading-blue">All Universities</h2>
        <div v-if = "loading">
            <fulfilling-bouncing-circle-spinner
                :animation-duration="1000"
                :size="60"
                :color="'#247BA0'"/>
        </div>
        <div v-if = "loaded">
            <div class="input-group shadow col-md-6 mb-5">
            <input type="text" class="form-control" placeholder="Type to search" aria-label="Search" v-model="searchQuery" ref="searchQuery">
            <!--div class="input-group-append">
                <span class="input-group-text"><font-awesome-icon icon="fa-solid fa-search" /></span>
            </div-->
        </div>
        <div v-if="universities.length">
            <div class="row justify-content-around" v-for="group in filteredUniversities">
                <div v-for="university in group" v-bind:key = "university.id" class="card shadow p-4 mb-5 col-sm-4">
                    <!--img v-bind:src = "badge" class="card-img-top" alt="..."/-->
                    <div v-if = "university.district" class="card-body">
                        <h5 class="card-title sub-heading my-3">{{university.university}}</h5>
                        <h6 class="card-subtitle mb-2 subtitle">{{university.district.name}}</h6>
                        <p class="card-text">{{university.university}} is a {{university.type.toLowerCase()}} institution in the {{university.region}} part of Uganda. 
                            It operates under the {{university.award}} award</p>
                            <router-link
                            :to = "{
                                name : 'UniversityProfile',
                                params : {
                                    id: university.id
                                }
                            }">
                            <button type="button" class="btn btn-primary-custom shadow col-12 my-3">See more</button>
                            </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-if = "dataLoadedError"> 
        <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Sorry, something went wrong!</h4>
                <p class="mb-0">We had trouble loading this information. Please try again later</p><br>
        </div>
    </div>
    </div>
</template>

<script>

import { FulfillingBouncingCircleSpinner } from 'epic-spinners';

export default {
    name : "local-universities",
    components : {
        FulfillingBouncingCircleSpinner
    },
    data : function(){
        return{
            universities : [],
            searchQuery : "",
            dataLoadedError : false,
            loading : true,
            loaded: false
        };
    },
    created() {
        this.loadUniversities();
    },
    methods : {
        loadUniversities(){
            axios.get('/v1/universities')
            .then(res => {
                const isDataAvailable = res.data && res.data.length;
                if(isDataAvailable){
                    this.universities = res.data;
                    this.loaded = true;
                }else{
                    const emptyDataError = new Error('Invalid data');
                    emptyDataError.statusCode = 500;
                    throw emptyDataError;
                }
            })
            .catch(error => {
                console.log(error);
                this.dataLoadedError = true;
            })
            .finally(() => this.loading = false);
        }
    },
    computed : {
        filteredUniversities(){
            const dataFilter = university => university.university.toLowerCase().match(this.searchQuery.toLowerCase()) && true;
            return _.chunk(this.universities.filter(dataFilter), 2); 
        }
    }
}

</script>