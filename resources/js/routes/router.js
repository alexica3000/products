import Vue from "vue";
import VueRouter from "vue-router";

import ExampleComponent from "../components/ExampleComponent";

import ProductList from "../pages/product/ProductList"
import ProductAdd from "../pages/product/ProductAdd";
import ProductEdit from "../pages/product/ProductEdit";

import CategoryList from "../pages/category/CategoryList";
import CategoryAdd from "../pages/category/CategoryAdd";
import CategoryEdit from "../pages/category/CategoryEdit";

Vue.use(VueRouter);

const routes = [
    {
        name: 'Index',
        path: '/',
        component: ExampleComponent
    },
    {
        name: 'Home',
        path: '/home',
        component: ExampleComponent
    },
    {
        name: 'ProductList',
        path: '/products',
        component: ProductList
    },
    {
        name: 'ProductAdd',
        path: '/products/add',
        component: ProductAdd
    },
    {
        name: 'ProductEdit',
        path: '/products/edit/:id',
        component: ProductEdit
    },
    {
        name: 'CategoryList',
        path: '/categories',
        component: CategoryList,
    },
    {
        name: 'CategoryAdd',
        path: '/categories/add',
        component: CategoryAdd
    },
    {
        name: 'CategoryEdit',
        path: '/categories/edit/:id',
        component: CategoryEdit
    }
];

const router = new VueRouter({ mode: 'history', routes: routes });

export {
    router
}
