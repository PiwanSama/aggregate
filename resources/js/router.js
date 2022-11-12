import Vue from 'vue'
import VueRouter from 'vue-router'
import Subjects from './components/SubjectListComponent.vue'
import Universities from './components/LocalUniversityComponent.vue'
import Homepage from './components/HomepageComponent.vue'
import ALevelPoints from './components/ALevelPointsComponent.vue'
import UserAccount from './components/AccountComponent.vue'

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
        path : '/a-level-points',
        name : 'ALevelPoints',
        component :  ALevelPoints
    },
    {
        path : '/account',
        name : 'User Account',
        component : UserAccount
    }
]

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes : routes,
    linkActiveClass: "active", // active class for non-exact links.
    linkExactActiveClass: "active" // active class for *exact* links.
})

export default router
