import Vue from "vue";
import VueRouter from "vue-router";
import Axios from "axios";

import ExampleComponent from "../components/ExampleComponent";
import ProductList from "../pages/product/ProductList"
import CategoryList from "../pages/category/CategoryList";

Vue.use(VueRouter);

const routes = [
    {
        name: 'Index',
        path: '/',
        component: ExampleComponent
    },
    {
        name: 'ProductList',
        path: '/products',
        component: ProductList
    },
    {
        name: 'CategoryList',
        path: '/categories',
        component: CategoryList
    }
];

const router = new VueRouter({ mode: 'history', routes: routes });

export {
    router
}
