require('./bootstrap');
import router from './router';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faBookmark } from '@fortawesome/free-regular-svg-icons';
import { faLocationDot, faSearch, faCircleRight, faPhone, faCircleInfo, faPenToSquare } from '@fortawesome/free-solid-svg-icons';
import { faGoogle,faLinkedin, faSquareTwitter, faSquareFacebook, faSquareInstagram } from '@fortawesome/free-brands-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(faLocationDot, faSearch, faCircleRight, faGoogle, faPhone, faSquareFacebook, faSquareTwitter,faSquareInstagram,faLinkedin, faCircleInfo, faBookmark, faPenToSquare)

window.Vue = require('vue').default;

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('navbar', require('./components/TheNavigationComponent.vue').default);
Vue.component('footerbar', require('./components/FooterComponent.vue').default);


const app = new Vue({
    el: '#app',
    router
});
