<template>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" @click="navigateTo('portfolio')">Portfolio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" @click="navigateTo('stocks')">Stocks</a>
        </li>
    </ul>
</template>

<script>

export default {
    name: "MainMenu.vue",
    methods: {
        navigateTo(page) {
            console.log(page);
            // Can this be moved to a mixin where I load the $store manually
            this.$store.commit('navigateTo', page);
        }
    }
}
</script>

<style scoped>

</style>
