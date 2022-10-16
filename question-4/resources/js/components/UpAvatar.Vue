<template>
    <div>
        <h1>Upload Avatar</h1>
        <div class="form-group mb-2">
            <input type="file" v-on:change="onImageChange" class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Enter Password:</label>
            <input type="password" class="form-control" v-model="user.password" required>
            <div v-if="errors.password"  v-for="message in errors.password" class="mt-2">
                <div class="alert alert-danger mb-2" role="alert">{{message}}</div>
            </div>
        </div>
        <div class="form-group mb-2">
            <button class="btn btn-success" @click="uploadImage" style="margin-right: 10px">Upload Avatar</button>
            <router-link :to="{ name: 'profile', params: {user_name: $route.params.user_name} }" class="btn btn-primary">Cancel</router-link>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            image: '',
            user: {},
            errors: {}
        }
    },
    methods: {
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        uploadImage(){
            let uri = `/api/user/${this.$route.params.user_name}/avatar`;
            axios.post(uri,{image: this.image, password: this.user.password}).then(response => {
                if (response.data.success) {
                    alert(response.data.success);
                }
            }).catch((error) => {
                this.errors = error.response.data.errors
            });
        }
    }
}
</script>
