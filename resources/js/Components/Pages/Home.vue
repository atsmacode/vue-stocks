<template>
    <div class="row">
        <h1 class="display-1">Home</h1>
        <p>This is your home page, use the top menu to navigate</p>
        <h2>Your funds: £{{ $store.getters.loadFunds }}</h2>
    </div>
</template>

<script>
export default {
    name: "Home.vue"
}
</script>

<style scoped>

</style>
