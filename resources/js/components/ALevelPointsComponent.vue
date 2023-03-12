<template>
     <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="my-5 card col-sm-8 col-md-8 col-lg-6 p-5">
                <div>
                <h2 class="sub-heading">What's your field of study?</h2>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="field-radio" id="artsRadio" value="arts" v-on:click="showArts" checked>
                        <label class="form-check-label" for="artsRadio">
                            Arts
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="field-radio" id="sciencesRadio" value="sciences" v-on:click="showSciences">
                        <label class="form-check-label" for="sciencesRadio">
                            Sciences
                        </label>
                    </div>
                    <div class="row my-3">
                        <h2 class="sub-heading">What combination did you do?</h2>
                        <div v-if = "loading">
                            <half-circle-spinner
                                :animation-duration="1000"
                                :size="60"
                                :color="'#247BA0'"
                            />
                        </div>
                        <div v-if="loaded">
                            <div v-if = "isArts" class = "form-group col-md-4">
                                <select class="form-control-sm" v-model = "selected">
                                    <option v-for="(combination, index) in scienceCombinations" :key="index" :value="combination">
                                        {{combination.combination}}
                                    </option> 
                                </select>
                            </div>
                            <div v-if = "isSciences" class = "form-group col-md-4">
                                <select class="form-control-sm" v-model = "selected">
                                    <option v-for="(combination, index) in artsCombinations" :key="index" :value="combination">
                                        {{combination.combination}}
                                    </option> 
                                </select>
                            </div>
                        </div>
                    </div>
                    <div v-if = "combinationsLoadedError"> 
                        <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Sorry, something went wrong!</h4>
                                <p class="mb-0">We had trouble loading this information. Please try again later</p><br>
                        </div>
                        </div>
                    <div class="row my-3" v-if= "selected">
                        <h2 class="sub-heading">What's were your grades in {{selected.combination}}?</h2>
                        <form action="#" class="form" @submit.prevent="submitData">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">{{selected.principal_one}} : </label>
                                <div class="col-sm-6">
                                    <select class="form-control-sm" v-model="principal_one" required>
                                        <option disabled value="">Please select one</option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                        <option>E</option>
                                        <option>O</option>
                                        <option>F</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">{{selected.principal_two}} : </label>
                                <div class="col-sm-6">
                                    <select class="form-control-sm" v-model="principal_two" required>
                                        <option disabled value="">Please select one</option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                        <option>E</option>
                                        <option>O</option>
                                        <option>F</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">{{selected.principal_three}} : </label>
                                <div class="col-sm-6">
                                    <select class="form-control-sm" v-model="principal_three" required>
                                        <option disabled value="">Please select one</option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                        <option>E</option>
                                        <option>O</option>
                                        <option>F</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">{{selected.subsidiary}} : </label>
                                <div class="col-sm-6">
                                    <select class="form-control-sm" v-model="subsidiary" required>
                                        <option disabled value="">Please select one</option>
                                        <option>1</option>
                                        <option>0</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">General Paper : </label>
                                <div class="col-sm-6">
                                    <select class="form-control-sm" v-model="general_paper" required>
                                        <option disabled value="">Please select one</option>
                                        <option>1</option>
                                        <option>0</option>
                                    </select>
                                </div>
                            </div>
                            <input class="btn btn-primary-custom mt-5 col-12" type="submit" value="Calculate my grades!"/>
                        </form>
                </div>
                </div>
                <div v-if = "showSpinner">
                    <fulfilling-bouncing-circle-spinner
                        :animation-duration="1000"
                        :size="60"
                        :color="'#247BA0'"
                    />
                </div>
                <div v-if = "resultsLoaded"> 
                <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <p>Aww yeah, you scored <span style="color:fff; font-weight: 700;">{{points}}</span> points!</p>
                        <hr>
                        <p class="mb-0">Create an account to find the best university courses for your combination and marks!</p><br>
                </div>
                <div v-if = "resultsLoadedError"> 
                <div class="alert alert-error" role="alert">
                        <h4 class="alert-heading">Sorry, something went wrong!</h4>
                        <p class="mb-0">We had trouble loading this information. Please try again later</p><br>
                </div>
                </div>
                <div>
                    <p class="text-center form-text text-muted or-text">OR</p>
                    <router-link to = "/register"><button type="button" class="btn btn-primary-custom col-12">Register an Account<span style="margin-left: 10px;"><font-awesome-icon icon="fa-solid fa-pen-to-square" /></span></button></router-link><br><br>
                    <p class="text-center text-muted">Already registered? Login <router-link to = "/login">here</router-link></p>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>

import { HalfCircleSpinner, FulfillingBouncingCircleSpinner } from 'epic-spinners'
import axios from 'axios'

export default {
    name : "ALevelPointsComponent",
    components : {
        HalfCircleSpinner,
        FulfillingBouncingCircleSpinner
    },
    data : function(){
        return{
            combinations : [],
            msg: [],
            selected: null,
            loading : true,
            loaded : false,
            combinationsLoadedError : false,
            isArts : true,
            isSciences : false,
            pointsCalculated : false,
            resultsLoaded : false,
            resultsLoadedError : false,
            showSpinner : false,
            principal_one : '',
            principal_two : '',
            principal_three : '',
            subsidiary : '',
            general_paper : '',
            points : '' 
        }
    },
    created(){
        this.loadCombinations();
    },
    methods : {
        loadCombinations(){
            axios.get('/v1/combinations')
            .then(res => {
                const isDataAvailable = response.data && response.data.length;
                if(isDataAvailable){
                    this.combinations = res.data;
                    this.loaded = true;
                }else{
                    const emptyDataError = new Error('Invalid data');
                    emptyDataError.statusCode = 500;
                    throw emptyDataError;
                }
            })
            .catch(error => {
                this.combinationsLoadedError = true;
            })
            .finally(() => this.loading = false);
        },
        showArts(){
            this.isSciences = false;
            this.isArts = true;
            if(this.selected != null) this.selected = null;
        },
        showSciences(){
            this.isArts = false;
            this.isSciences = true;
            if(this.selected != null) this.selected = null;
        },
        submitData(){
            this.showSpinner = true;
            axios.post('/v1/getPointsAdvanced', {
            headers: {
                "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
            },
            body: "principal_one="+this.principal_one+
                  "&principal_two="+this.principal_two+
                  "&principal_three="+this.principal_three+
                  "&subsidiary="+this.subsidiary+
                  "&general_paper="+this.general_paper
            })
            .then(res => res.json())
            .then(res => {
                this.points = res.points;
                this.pointsCalculated = true;
                this.resultsLoaded = true;
                localStorage.selected = JSON.stringify(this.selected);
                localStorage.points = res.points;
            })
            .catch(function (error) {
                //this.resultsLoadedError = true;
                console.log('Request failed', error);
            })
            .finally(() => this.showSpinner = false);
        }
    },
    computed : {
        artsCombinations(){
           return this.combinations.filter(combination => combination.category.indexOf('Arts'));
        },
        scienceCombinations(){
            return this.combinations.filter(combination => combination.category.indexOf('Sciences'));
        }
    },
    watch: {
        principal_one(principal_one_val) {
            localStorage.principal_one = principal_one_val;
        },
        principal_two(principal_two_val) {
            localStorage.principal_two = principal_two_val;
        },
        principal_three(principal_three_val) {
            localStorage.principal_three = principal_three_val;
        },
        general_paper(principal_gp_val) {
            localStorage.gp = principal_gp_val;
        },
        subsidiary(principal_sub_val) {
            localStorage.principal_sub = principal_sub_val;
        },
        principal_one_subject(principal_one_subject) {
            localStorage.principal_one_subject = principal_one_subject;
        },
        principal_two_subject(principal_two_subject) {
            localStorage.principal_two_subject = principal_two_subject;
        },
        principal_three_subject(principal_three_subject) {
            localStorage.principal_three_subject = principal_three_subject;
        },
        subsidiary_subject(subsidiary_subject) {
            localStorage.subsidiary_subject = subsidiary_subject;
        },
        general_paper_subject(general_paper_subject) {
            localStorage.general_paper_subject = general_paper_subject;
        }
  }
  }
</script>

