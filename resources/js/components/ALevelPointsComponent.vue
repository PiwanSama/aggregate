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
                                :color="'#002855'"
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
                <div v-if = "submitted"> 
                <div v-if = "showSpinner">
                    <fulfilling-bouncing-circle-spinner
                        :animation-duration="1000"
                        :size="60"
                        :color="'#002855'"
                    />
                </div>
                <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <p>Aww yeah, you scored <span style="color:fff; font-weight: 700;">{{points}}</span> points!</p>
                        <hr>
                        <p class="mb-0">Do you want to create an account? You can save your grades and find the best university programs based on your grades!</p><br>
                </div>
                <div>
                    <button type="button" class="btn btn-google col my-2"><span style="margin-right: 10px;"><img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/></span>Continue with Google</button><br><br>
                    <p class="text-center form-text text-muted or-text">OR</p>
                    <button type="button" class="btn btn-primary-custom col-12">Register an Account<span style="margin-left: 10px;"><font-awesome-icon icon="fa-solid fa-pen-to-square" /></span></button><br><br>
                    <p class="text-center text-muted">Already registered? Login <router-link to = "/account">here</router-link></p>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>

import { HalfCircleSpinner, FulfillingBouncingCircleSpinner } from 'epic-spinners'

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
            isArts : true,
            isSciences : false,
            pointsCalculated : false,
            submitted : false,
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
            fetch('/v1/combinations')
            .then(res => res.json())
            .then(res => {
                this.combinations = res;
                this.loaded = true;
                this.loading = false;
            });
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
            this.submitted = true;
            this.showSpinner = true;
            fetch('/v1/getPointsAdvanced', {
            method: 'post',
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
                this.showSpinner = false;
            })
            .catch(function (error) {
            console.log('Request failed', error);
            });
        }
    },
    computed : {
        artsCombinations(){
           return this.combinations.filter(combination => combination.category.indexOf('Arts'));
        },
        scienceCombinations(){
            return this.combinations.filter(combination => combination.category.indexOf('Sciences'));
        }
    }
  }
</script>

