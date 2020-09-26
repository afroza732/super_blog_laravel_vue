require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import dashboard from "./components/ExampleComponent.vue";
import profile from "./components/Profile.vue";

Vue.use(VueRouter);

const routes = [
    {
        path: "/dashboard",
        component: dashboard
    },
    { path: "/profile", component: profile }
];
// Vue.component(
//     "example-component",
//     require("./components/ExampleComponent").default
// );

const router = new VueRouter({
    routes
    //mode: "history"
});
//console.log(router);
const app = new Vue({
    el: "#app",
    router
});
