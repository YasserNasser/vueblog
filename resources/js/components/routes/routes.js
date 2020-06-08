import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Posts from '../../components/Posts.vue';
import SinglePost from '../../components/SinglePost.vue';

const routes = [

    {path:'/' , component: Posts , name: 'Post' },
    {path:'/post/:slug' , component: SinglePost , name: 'SinglePost' },
];

const router = new VueRouter({

    routes,
    hashbang:false,
    node:'history'

});

export default router;