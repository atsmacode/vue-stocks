<template>
    <span class="navbar-text">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li v-if="!user" class="nav-item">
                <input type="text" name="email" v-model="email" />
                <input type="text" name="password" v-model="password" />
                <a class="nav-link" @click="logIn" href="#">Login</a>
            </li>
            <li v-else class="nav-item">
                <a class="nav-link" @click="logOut" href="#">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">End Day</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Save & Load</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Funds: £{{ funds }}</a>
            </li>
        </ul>
  </span>
</template>

<script>
import axios from "axios";
axios.defaults.withCredentials = true;

export default {
    name: "AccountMenu.vue",
    data(){
        return {
            email: '',
            password: ''
        }
    },
    computed: {
        funds() {
            return this.$store.state.user.funds;
        },
        user() {
            return this.$store.state.user;
        }
    },
    methods: {
        endDay(user){

        },
        saveAndLoad(user){

        },
        logIn(){
            axios.get('/sanctum/csrf-cookie').then(response => {
                console.log(response)
                // Login...
                axios.post('login', {
                    email: this.email,
                    password: this.password
                }).then(response => {
                    console.log(response.data.user)
                    this.$store.commit('setUser', response.data.user);
                    this.$store.commit('refreshData');
                    this.$store.commit('navigateTo', 'portfolio');
                })
            });
        },
        logOut(){

            axios.post('logout').then(response => {
                console.log(response);
                this.session = false;
                this.$store.commit('clearData');
                this.$store.commit('navigateTo', 'home');
            });

        }
    }
}
</script>

<style scoped>

</style>
