require("./bootstrap");

window.Vue = require("vue");
//router
import VueRouter from "vue-router";
Vue.use(VueRouter);
import { routes } from "./routes.js";

Vue.component(
    "admin-main",
    require("./components/admin/MasterComponent.vue").default
);

const router = new VueRouter({
    routes,
    mode: "history"
});
//console.log(router);
const app = new Vue({
    el: "#app",
    router
});
