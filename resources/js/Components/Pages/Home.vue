<template>
    <div class="row">
        <h1 class="display-1">Home</h1>
        <p>This is your home page, use the top menu to navigate</p>
        <h2>Your funds: £{{ funds }}</h2>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Home.vue",
    computed: {
        funds() {
            return this.$store.state.user.funds;
        }
    },
}
</script>

<style scoped>

</style>
