import 'bootstrap';
import axios from "axios";

import Vue from 'vue';
import Header from "./Components/Navigation/Header";
import Home from "./Components/Pages/Home";
import Stocks from "./Components/Pages/Stocks";
import Portfolio from "./Components/Pages/Portfolio";

import Vuex from "vuex";
Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        currentPage: 'home',
        stocks: [],
        portfolio: [],
        funds: 0
    },
    mutations: {
        navigateTo(state, page) {
            state.currentPage = page;
        },
        loadStocks(state, stocks) {
            state.stocks = stocks;
        },
        loadPortfolio(state, portfolio) {
            state.portfolio = portfolio;
        },
        loadFunds(state, funds) {
            state.funds = funds;
        }
    },
    getters: {
        getStocks(state){
            return state.stocks;
        },
        getPortfolio(state){
            return state.portfolio;
        },
        loadFunds(state){
            return state.funds;
        }
    }
});

new Vue({
    el: '#app',
    data: {
        url: 'http://localhost:8080/vue-stocks/public/'
    },
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
    }
    ,
    mounted() {

        // Load stocks and portfolios via axios

        axios
            .get(this.url + 'stocks')
            .then(response => (
                //console.log(response.data)
                this.$store.commit('loadStocks', response.data)
            ));

        axios
            .get(this.url + 'portfolio')
            .then(response => (
                //console.log(response.data)
                this.$store.commit('loadPortfolio', response.data)
            ));

        axios
            .get(this.url + 'user/1')
            .then(response => (
                this.$store.commit('loadFunds', response.data.funds)
            ));



    }
});
