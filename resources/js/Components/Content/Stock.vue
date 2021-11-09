<template>
    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
        <div class="card">
            <p class="bg-info h-100 w-100 d-block text-center p-3">Image</p>
            <div class="card-body">
                <form>

                    <h5 v-text="name" class="card-title"></h5>
                    <p v-text="description" class="card-text"></p>

                    <template v-if="!portfolio">
                        <p>Available: {{ available }}</p>
                        <p>Price: {{ price }}</p>
                        <input class="form-control" type="text" name="quantity" v-model="quantity" placeholder="Buy Quantity" />
                        <br>
                        <button
                            type="submit"
                            v-on:click.prevent="buy"
                            v-text="callToAction"
                            class="btn btn-primary"></button>
                    </template>

                    <template v-else>
                        <p v-text="'You own: ' + amount"></p>
                        <p v-text="'Now worth: ' + value"></p>
                        <br>
                        <button
                            type="submit"
                            v-on:click.prevent="sell"
                            v-text="callToAction"
                            class="btn btn-primary"></button>
                    </template>


                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Stock",
    data() {
        return {
            quantity: 0
        }
    },
    methods: {
        buy(){

            axios
                .post('portfolio', {'stock_id': this.id, 'quantity': this.quantity, 'user_id': 1})
                .then(response => (
                    this.$store.commit('loadStocks', response.data.stocks),
                    this.$store.commit('loadPortfolio', response.data.portfolio),
                    this.$store.commit('loadFunds', response.data.funds)
                ));

        },
        sell(){

            axios
                .delete('portfolio' + '/' + this.id)
                .then(response => (
                    console.log(response.data.funds),
                    this.$store.commit('loadStocks', response.data.stocks),
                    this.$store.commit('loadPortfolio', response.data.portfolio),
                    this.$store.commit('loadFunds', response.data.funds)
                ));

        },
    },
    props: [
        'portfolio',
        'callToAction',
        'name',
        'description',
        'amount',
        'price',
        'value',
        'available',
        'id'
    ]
}
</script>

<style scoped>

</style>
