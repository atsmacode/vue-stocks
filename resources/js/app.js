import 'bootstrap';
import Vue from 'vue';
import Header from "./Components/Navigation/Header";
import Home from "./Components/Pages/Home";
import Stocks from "./Components/Pages/Stocks";
import Portfolio from "./Components/Pages/Portfolio";
import store from './store/store';

import axios from "axios";

axios.defaults.withCredentials = true;

new Vue({
    el: '#app',
    store: store,
    computed: {
        currentTab(){
            return 'app-' + this.$store.state.currentPage;
        }
    },
    components: {
        appHeader: Header,
        appHome: Home,
        appStocks: Stocks,
        appPortfolio: Portfolio
    },
    methods: {
        daysTrading(){
            // For each portfolio
                // Randomise a performance amount/new valuation
                // Update stock value
        }
    },
    created() {
        // Load stocks and portfolios via axios
        this.$store.commit('loadStocks');
        this.$store.commit('loadPortfolio');
        this.$store.commit('loadFunds');

        /*axios.get('/sanctum/csrf-cookie').then(response => {
            console.log(response)
            // Login...
        });*/
    }
});
