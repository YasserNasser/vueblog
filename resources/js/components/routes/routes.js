import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Posts from '../../components/Posts.vue';
import SinglePost from '../../components/SinglePost.vue';
import CategoryPosts from '../../components/CategoryPosts.vue';

const routes = [

    {path:'/' , component: Posts , name: 'Post' },
    {path:'/post/:slug' , component: SinglePost , name: 'SinglePost' },
    {path:'/category/:slug/posts' , component: CategoryPosts , name: 'CategoryPosts' },
];

const router = new VueRouter({

    routes,
    hashbang:false,
    mode:'history'

});

export default router;