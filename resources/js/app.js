/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('posts', require('./components/Posts.vue').default);
Vue.component('home', require('./components/Home.vue').default);
Vue.component('register', require('./components/Register.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import router from '../routes/routes'
import Vuex from 'vuex'
import Axios from 'axios';
Vue.use(Vuex)
const store = new Vuex.Store({
    state:{
        userToken: null,
        user : null,
        Editedpost : {},
    },
    getters:{
        isLogged(state){
            return !!state.userToken;
        },
        isAdmin(state){
            if(state.user){
                return state.user.is_admin;
            }
            return null;
        },
        PostToEdit(state){
            return state.Editedpost;
        }
    },
    mutations:{
        setUserToken(state,userToken){
            state.userToken = userToken;
            localStorage.setItem('userToken',JSON.stringify(userToken));
            Axios.defaults.headers.common.Authorization = `Bearer ${userToken}`
        },
        removeUserToken(state){
            state.userToken = null;
            localStorage.removeItem('userToken');
        },
        setUser(state,user){
            state.user = user;
        },
        logout(state){
            state.userToken = null;
            localStorage.removeItem('userToken');
            window.location.pathname = "/";
        },
        EditPost(state,post){
            state.Editedpost = post;
        },

    },
    actions:{
         RegisterUser({commit},payload){
             axios.post('/api/register',payload)
             .then((response) =>{
                 console.log(response);
                 commit('setUserToken',response.data.token);

             })
             .catch((error) =>{
                console.log(error);
             });
         },
         LoginUser({commit},payload){
            axios.post('/api/login',payload)
            .then((response) =>{
                console.log(response);
                commit('setUserToken',response.data.token);
                axios.get('/api/user')
                .then((res) =>{
                    console.log(res.data);
                })
                .catch((err) =>{
                    console.log(err);
                 });
            })
            .catch((error) =>{
               console.log(error);
            });
        }
    }
})

const app = new Vue({
    el: '#app',
    router,
    store:store,
    mode:'history'
});
