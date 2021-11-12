<template>
    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
        <div class="card">
            <p class="bg-info h-100 w-100 d-block text-center p-3">Image</p>
            <div class="card-body">
                <form>

                    <h5 v-text="name" class="card-title"></h5>
                    <p v-text="description" class="card-text"></p>

                    <template v-if="!portfolio">
                        <p>Available: {{ stock.available }}</p>
                        <p>Price: {{ stock.price }}</p>
                        <input class="form-control" type="text" name="quantity" v-model="quantity" placeholder="Buy Quantity" />
                        <br>
                        <button
                            type="submit"
                            v-on:click.prevent="buy"
                            v-text="callToAction"
                            class="btn btn-primary"></button>
                    </template>

                    <template v-else>
                        <p v-text="'You own: ' + stock.amount"></p>
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
            quantity: ''
        }
    },
    computed: {
        value(){
            return this.stock.value;
        }
    },
    methods: {
        buy(){
            console.log(this.$store.state.user.id);
            this.$store.dispatch('buyStock', {'stock_id': this.stock.id, 'quantity': this.quantity, 'user_id': this.$store.state.user.id});
        },
        sell(){
            this.$store.dispatch('sellStock', {'stock_id': this.stock.stock_id, 'quantity': this.stock.amount, 'user_id': this.$store.state.user.id});
        },
    },
    props: [
        'portfolio',
        'callToAction',
        'name',
        'description',
        'stock'
    ]
}
</script>

<style scoped>

</style>
