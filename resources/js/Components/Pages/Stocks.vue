<template>
    <div class="row">
        <h1 class="display-1">Stocks</h1>
        <p>These are all the stocks available to buy</p>
        <div class="row">
            <app-stock v-for="stock in stocks"
                       :portfolio="false"
                       :name="stock.name"
                       :description="stock.description"
                       :stock="stock"
                       callToAction="Buy"
                       :key="stock.id"
            ></app-stock>
        </div>
    </div>
</template>

<script>
import Stock from "../Content/Stock";

export default {
    name: "Stocks.vue",
    computed: {
        stocks(){
            return this.$store.getters.getStocks;
        }
    },
    components: {
        appStock: Stock
    }
}
</script>

<style scoped>

</style>
