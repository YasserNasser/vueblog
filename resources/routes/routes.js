import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Posts from '../../resources/js/components/Posts.vue';
import SinglePost from '../../resources/js/components/SinglePost.vue';
import CategoryPosts from '../../resources/js/components/CategoryPosts.vue';
import AdminIndex from '../../resources/js/components/admin/AdminIndex.vue';

const routes = [

    {path:'/' , component: Posts , name: 'Post' },
    {path:'/post/:slug' , component: SinglePost , name: 'SinglePost' },
    {path:'/category/:slug/posts' , component: CategoryPosts , name: 'CategoryPosts' },
    {path:'/admin' , component: AdminIndex , name: 'AdminIndex' },
];

const router = new VueRouter({

    routes,
    hashbang:false,
    mode:'history'

});

export default router;