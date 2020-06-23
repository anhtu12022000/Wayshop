<!-- <template>
   <div id="app">
       <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="">
                       
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="email" type="email" v-model="email" class="form-control is-invalid" name="email" value="" required autocomplete="email" autofocus>

                       
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="password" type="password" v-model="password" class="form-control is-invalid" name="password" required autocomplete="current-password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" >

                                    <label class="form-check-label" for="remember">
                                      Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" @click.evt="login_user" class="btn btn-primary">
                                   Login
                                </button>

                                Forgot Your Password?
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   </div>
</template>
-->

<template>
    <div id="login">
        <v-app>
            <v-snackbar v-model="snackbar">
                {{ text }}
                <v-btn color="pink" text @click="snackbar = false"><v-icon>mdi-close-circle-outline</v-icon></v-btn>
            </v-snackbar>

            <!-- Login Modal -->  
            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                        <v-progress-linear
                        :active="loading"
                        :indeterminate="loading"
                        absolute
                        top
                        color="white accent-4"
                        ></v-progress-linear>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Login or Register</h4>
                        <v-form
                        ref="form"
                        v-model="valid"
                        method="post"
                        v-on:submit.stop.prevent="login_user"
                        >
                        <v-text-field
                        color="error"
                        label="Email"
                        v-model="email"
                        :rules="emailRules"
                        name="email"
                        required
                        prepend-icon="mdi-account-circle-outline"
                        type="email"
                        /></v-text-field>

                        <v-text-field
                        color="error"
                        id="password"
                        label="Password"
                        v-model="password"
                        name="password"
                        prepend-icon="mdi-account-lock-outline"
                        type="password"
                        :rules="passwordRules"
                        required
                        /></v-text-field>
                        <label for="rememberme" class="rememberme"><input type="checkbox" name="remember_token" id="rememberme"> Remember me </label>
                        <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                        <div class="aa-register-now">
                          Don't have an account?<a href="http://dailyshop.com/my-account">Register now!</a>
                      </div>
                  </v-form>
                  <v-card-actions>
                    <v-spacer />
                    <v-btn block color="error" :disabled="!valid" @click.prevent="login_user">Login</v-btn>
                </v-card-actions>

            </div>                        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>   
</v-app>
</div>
</template>
<style>
    .v-btn--text {
      float: right;
    }
</style>
<script>
export default {
   data: () => ({
    valid: true,
    email: "vungoctu.dev@gmail.com",
    emailRules: [
    v => !!v || 'E-mail is required',
    v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
    ],
    password: "123456",
    passwordRules: [
    v => !!v || 'Password is required',
    ],
    loading: false,
    snackbar: false,
    text: '',
    _token: $('meta[name="csrf-token"]').attr('content'),
}),
   methods: {
    login_user () {
        $('#linear').toggle(100);
        let formdata = new FormData();
        formdata.append('email', this.email);
        formdata.append('password', this.password);
        formdata.append('_token', this._token);
        let config = {
            header: {
                "Content-Type": "multipart/form-data",
                'X-CSRF-TOKEN': this._token
            }
        };
        axios.post(this.$host_url+'/login', formdata, config)
        .then(res => {
            if (res.data.status == true) {
                let token = res.data.token.token;
                let user_id = res.data.user.id
                localStorage.setItem("token", token);
                localStorage.setItem("name", res.data.user.name);
                localStorage.setItem("user_id", user_id);
                $.ajax({
                  header: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type: 'post',
                  url: '/user/login',
                  data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email: this.email,
                    password: this.password
                  },
                  success: function (data) {
                     window.location.href = "http://dailyshop.com/";
                  }
                });
                
            } else {
                this.text = res.data.message;
                this.snackbar = true;
                $('#linear').toggle(3000);
            };
        }).catch(err => {
            console.log(err);
        });
    }
},
mounted() {
    console.log('Component login.')
}
}
</script>
