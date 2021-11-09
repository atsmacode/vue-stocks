<template>
    <span class="navbar-text">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="#">End Day</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Save & Load</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Funds: £{{ $store.getters.loadFunds }}</a>
            </li>
        </ul>
  </span>
</template>

<script>
export default {
    name: "AccountMenu.vue",
    methods: {
        endDay(user){

        },
        saveAndLoad(user){

        },
    }
}
</script>

<style scoped>

</style>
