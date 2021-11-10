<template>
    <div class="row">
        <h1 class="display-1">Portfolio</h1>
        <p>Here are all the stocks you own and how they are doing</p>
        <div class="row">
            <app-stock v-for="portfolio in $store.getters.getPortfolio"
                       :portfolio="true"
                       :name="portfolio.stock.name"
                       :description="portfolio.stock.description"
                       :stock="portfolio"
                       callToAction="Sell"
                       :key="portfolio.id"
            ></app-stock>
        </div>

    </div>
</template>

<script>
import Stock from "../Content/Stock";

export default {
    name: "Portfolio.vue",
    components: {
        appStock: Stock
    },
}
</script>

<style scoped>

</style>
