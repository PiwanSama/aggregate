import Vue from 'vue'
import VueRouter from 'vue-router'
import Subjects from './components/SubjectListComponent.vue'
import Universities from './components/LocalUniversityComponent.vue'
import Homepage from './components/HomepageComponent.vue'
import ALevelPoints from './components/ALevelPointsComponent.vue'
import UniversityProfile from './components/UniversityProfile.vue'
import FacultyPrograms from './components/FacultyProgramsComponent.vue'
import UserAccount from './components/AccountComponent.vue'
import Login from './components/LoginComponent.vue'
import Signup from './components/SignUpComponent.vue'

Vue.use(VueRouter);

const routes = [
    {
        path : '/',
        name : 'Home',
        component : Homepage
    },
    {
        path : '/subjects',
        name : 'Subjects',
        component : Subjects
    },
    {
        path : '/universities',
        name : 'Universities',
        component :  Universities
    },
    {
        path : '/universities/:id',
        name : 'UniversityProfile',
        component :  UniversityProfile
    },
    {
        path : '/universities/faculty/:id/programs',
        name : 'FacultyPrograms',
        component :  FacultyPrograms,
        props:true
    },
    {
        path : '/a-level-points',
        name : 'ALevelPoints',
        component :  ALevelPoints
    },
    {
        path : '/account',
        name : 'UserAccount',
        component : UserAccount
    },
    {
        path : '/login',
        name : 'Login',
        component : Login
    },
    {
        path : '/signup',
        name : 'Signup',
        component : Signup
    }];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes : routes,
    linkActiveClass: "active", // active class for non-exact links.
    linkExactActiveClass: "active" // active class for *exact* links.
})

export default router
