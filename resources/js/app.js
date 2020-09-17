require("./bootstrap");

window.Vue = require("vue");
//router
import VueRouter from "vue-router";
Vue.use(VueRouter);

import { routes } from "./routes/routes";

Vue.component(
    "home-component",
    require("./components/admin/master.vue").default
);

const router = new VueRouter({
    routes // short for `routes: routes`
});

const app = new Vue({
    el: "#app",
    router
});
