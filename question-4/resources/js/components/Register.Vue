<template>
    <div>
        <h1>Register</h1>
        <form @submit.prevent="register">
            <div class="form-group mb-2">
                <label>Username:</label>
                <input type="text" class="form-control" v-model="user.user_name" required>
                <div v-if="errors.user_name"  v-for="message in errors.user_name" class="mt-2">
                    <div class="alert alert-danger mb-2" role="alert">{{message}}</div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label>Fullname:</label>
                <input type="text" class="form-control" v-model="user.fullname" required>
                <div v-if="errors.fullname"  v-for="message in errors.fullname" class="mt-2">
                    <div class="alert alert-danger mb-2" role="alert">{{message}}</div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label>Email:</label>
                <input type="email" class="form-control" v-model="user.email" required>
                <div v-if="errors.email"  v-for="message in errors.email" class="mt-2">
                    <div class="alert alert-danger mb-2" role="alert">{{message}}</div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label>Password:</label>
                <input type="password" class="form-control" v-model="user.password" required>
                <div v-if="errors.password"  v-for="message in errors.password" class="mt-2">
                    <div class="alert alert-danger mb-2" role="alert">{{message}}</div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label>Password Confirmation:</label>
                <input type="password" class="form-control" v-model="user.password_confirmation" required>
                <div v-if="errors.password_confirmation"  v-for="message in errors.password_confirmation" class="mt-2">
                    <div class="alert alert-danger mb-2" role="alert">{{message}}</div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label>Phone number:</label>
                <input type="text" class="form-control" v-model="user.phone_number">
                <div v-if="errors.phone_number"  v-for="message in errors.phone_number" class="mt-2">
                    <div class="alert alert-danger mb-2" role="alert">{{message}}</div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label>About me:</label>
                <textarea class="form-control" v-model="user.about_me"></textarea>
                <div v-if="errors.about_me"  v-for="message in errors.about_me" class="mt-2">
                    <div class="alert alert-danger mb-2" role="alert">{{message}}</div>
                </div>
            </div>
            <div class="form-group mb-2">
                <button class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                user:{},
                errors:{}
            }
        },
        methods: {
            register(){
                let uri = 'api/user';
                this.axios.post(uri, this.user).then((response) => {
                    this.$router.push({name: 'profile', 'params': {'user_name': this.user.user_name}});
                }).catch((error) => {
                    this.errors = error.response.data.errors
                });
            }
        }
    }
</script>
