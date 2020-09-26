require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import { routes } from "./routes.js";

Vue.use(VueRouter);

Vue.component("master-component", require("./components/Master").default);

const router = new VueRouter({
    routes,
    mode: "history"
});
//console.log(router);
const app = new Vue({
    el: "#app",
    router
});
