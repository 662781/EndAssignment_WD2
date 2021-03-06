import { createApp } from 'vue';
import App from './App.vue';
import { createRouter, createWebHistory } from 'vue-router';
import store from './store/store.js';

import Home from './components/Home.vue';
import ProductList from './components/products/ProductList.vue';
import CreateProduct from './components/products/CreateProduct.vue';
import EditProduct from './components/products/EditProduct.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';
import Cart from './components/cart/Cart.vue';
import Creator from './components/Creator.vue';
import Profile from './components/Profile.vue';


const routes = [
    { path: '/', component: Home },
    { path: '/products', component: ProductList },
    { path: '/createproduct', component: CreateProduct },
    { path: '/editproduct/:id', component: EditProduct, props: true  },
    { path: '/login', component: Login },
    { path: '/register', component: Register },
    { path: '/cart', component: Cart },
    { path: '/creator', component: Creator },
    { path: '/profile', component: Profile }
];

const router = createRouter({
    "history": createWebHistory(),
    routes
})

const app = createApp(App);
app.use(router);
app.use(store);
app.mount('#app');