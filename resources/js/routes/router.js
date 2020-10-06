import Vue from "vue";
import VueRouter from "vue-router";
import Axios from "axios";

import ExampleComponent from "../components/ExampleComponent";

Vue.use(VueRouter);
Vue.use(Axios);

const routes = [
    {
        name: 'Index',
        path: '/',
        component: ExampleComponent
    }
];

const router = new VueRouter({ mode: 'history', routes: routes });

export {
    router
}
