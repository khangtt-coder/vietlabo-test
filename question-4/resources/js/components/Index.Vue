<template>
    <div>
        <h1>User Information</h1>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'register' }" class="btn btn-primary">Register User</router-link>
            </div>
        </div>
        <br />
        <div>
            <div class="card">
                <img class="card-img-top mt-2 mb-2" v-bind:src="user.avatar" alt="avatar" style="width: 100px;margin-left: 12px;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Name: {{user.fullname}}</li>
                    <li class="list-group-item">Email: {{user.email}}</li>
                    <li class="list-group-item">Phone number: {{user.phone_number}}</li>
                </ul>
                <div class="card-body">
                    <h5 class="card-title">About me</h5>
                    <p class="card-text">{{user.about_me}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {}
        }
    },
    created() {
        let uri = 'api/';
        this.axios.get(uri).then(response => {
            this.user = response.data.data;
        });
    }
}
</script>
