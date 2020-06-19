<template >
    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form action="/examples/actions/confirmation.php" method="post" nonvalidate>
                        <h2 class="text-center">Create New Account</h2>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Full Name" v-model="name">
                            <div v-show="nameError" class="text-danger">
                                name Must be more than 8 Letter!!
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" v-model="email">
                            <div v-show="emailError" class="text-danger">
                                Email is Not valid!!
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" v-model="password">
                        <div v-show="passwordError" class="text-danger">
                                Password must be more than 7 letter!!
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" @click.prevent="submitRegister" class="btn btn-primary btn-block" :disabled="!isValidForm" >Create Account</button>
                        </div>
                        <div class="clearfix">
                            <a href="#" class="pull-right">Forgot Password?</a>
                        </div>
                    </form>
                    <p class="text-center">having account ?
                        <strong class="switch-tologin-modal" ><a href="#">Login</a></strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</template>
<script >
import $ from 'jquery'
export default {
    data (){
        return {

            name:'',
            email:'',
            password:'',
        }
        
    },
    computed: {
        nameError(){
            return this.name.length > 0 && this.name.length < 8
        },
        emailError(){
                return (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))) && this.email.length > 0
        },
        passwordError(){
            return this.password.length > 0 && this.password.length <= 7
        },
        isValidForm(){
            return ( this.name.length > 8 && this.password.length > 8
            && (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) )
        }
    },
    methods:{
        submitRegister(){
            //console.log('submiting register form');
            let {name,email,password} = this;
            this.$store.dispatch('RegisterUser',{name,email,password});
            $('#register-modal').modal('hide')
        }
    }
}
</script>