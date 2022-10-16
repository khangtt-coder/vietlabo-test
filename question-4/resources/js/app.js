import './bootstrap';
import { createApp } from "vue";

// Vue Router 4
import { createRouter, createWebHistory } from "vue-router";

import App from './App.vue';
import HomeComponent from './components/Index.vue';
import RegisterComponent from './components/Register.vue';
import UserProfileComponent from './components/UserProfile.vue';
import EditUserComponent from './components/EditUser.vue';
import UploadAvatarComponent from './components/UpAvatar.vue';

const app = createApp(App);

const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent
    },
    {
        name: 'register',
        path: '/register',
        component: RegisterComponent
    },
    {
        name: 'profile',
        path: '/user/:user_name',
        component: UserProfileComponent
    },
    {
        name: 'editUser',
        path: '/user/:user_name/edit',
        component: EditUserComponent
    },
    {
        name: 'uploadAvatar',
        path: '/user/:user_name/avatar',
        component: UploadAvatarComponent
    }
];

app.use(createRouter({
    history: createWebHistory(),
    routes: routes
}));

import VueAxios from 'vue-axios';
import axios from 'axios';
import UploadAvatar from "./components/UploadAvatar.Vue";
app.use(VueAxios, axios);

app.mount("#app");
