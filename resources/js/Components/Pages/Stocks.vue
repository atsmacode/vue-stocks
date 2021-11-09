<template>
    <div class="row">
        <h1 class="display-1">Stocks</h1>
        <p>These are all the stocks available to buy</p>
        <div class="row">
            <app-stock v-for="stock in $store.getters.getStocks"
                       :portfolio="false"
                       :name="stock.name"
                       :id="stock.id"
                       :description="stock.description"
                       :available="stock.available"
                       :price="stock.price"
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
    components: {
        appStock: Stock
    }
}
</script>

<style scoped>

</style>
