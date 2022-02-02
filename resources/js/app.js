import vue from "vue";
window.Vue = vue;

import axios from "axios";
import VueAxios from "vue-axios";
import VueRouter from "vue-router";
import crono from 'vue-crono';
import Toast from "vue-toastification";
import moment from 'moment';
import 'moment/locale/es';
Vue.prototype.moment = moment
Vue.use(require('vue-moment'));
Vue.use(crono);
import {
    ToastPlugin,
    ModalPlugin
} from 'bootstrap-vue';
// ? Importar rutas y localstorage
import {
    routes
} from "./app/routes";
import store from "./app/store";

// ? importar layout
import App from "./app/layouts/App";

// ? importar los componentes globales y el core plugins
import FeatherIcon from "./app/components/FeatherIcon.vue";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
require('../fonts/feather/iconfont.css');
import "./app/core/core";
Vue.use(VueSweetalert2);

axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://192.168.1.7:8000/api/";
const token = localStorage.getItem('auth')
if (token) {
    axios.defaults.headers.common['Authorization'] = token
}

Vue.use(VueAxios, axios);
Vue.use(VueRouter);
Vue.use(ToastPlugin);
const options = {
    hideProgressBar: true,
    closeOnClick: false,
    closeButton: false,
    icon: false,
    timeout: 3000,
    transition: 'Vue-Toastification__fade',
};
Vue.use(Toast, options);
Vue.component(FeatherIcon.name, FeatherIcon);

const router = new VueRouter({
    routes,
    mode: 'history'
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requireAuth)) {
        if (store.getters.isLoggedIn) {
            next();
            return;
        }
        next("/login");
    } else {
        next();
    }
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.guest)) {
        if (store.getters.isLoggedIn) {
            next("/dashboard");
            return;
        }
        next();
    } else {
        next();
    }
});

const app = new Vue({
    el: "#app",
    router: router,
    store: store,
    render: (h) => h(App),
});
