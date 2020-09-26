import dashboard from "./components/ExampleComponent.vue";
import home from "./components/home/Home.vue";

export const routes = [
    {
        path: "/dashboard",
        component: dashboard
    },
    { path: "/home", component: home }
];
