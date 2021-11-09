<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" @click="navigateTo('home')">Stock Trader</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">

                <app-main-menu></app-main-menu>

                <app-account-menu></app-account-menu>

            </div>
        </div>
    </nav>
</template>

<script>
import MainMenu from "./MainMenu.vue";
import AccountMenu from "./AccountMenu.vue";

export default {
    name: "Header.vue",
    components: {
        appMainMenu: MainMenu,
        appAccountMenu: AccountMenu
    },
    methods: {
        navigateTo(page) {
            console.log(page);
            this.$store.commit('navigateTo', page);
        }
    }
}
</script>

<style scoped>

</style>
