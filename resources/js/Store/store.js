import Vue from 'vue';
import Vuex from 'vuex';
import axios from "axios";
import stocks from './Modules/stocks';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        currentPage: 'home',
        stocks: [],
        portfolio: [],
        funds: 0
    },
    modules: {
        stocks
    },
    mutations: {
        navigateTo(state, page) {
            state.currentPage = page;
        },
        loadStocks(state) {
            axios
                .get('stocks')
                .then(response => (
                    //console.log(response.data)
                    state.stocks = response.data
                ));
        },
        loadPortfolio(state) {
            axios
                .get('portfolio')
                .then(response => (
                    //console.log(response.data)
                    state.portfolio = response.data
                ));
        },
        loadFunds(state) {
            axios
                .get('user/1')
                .then(response => (
                    state.funds = response.data.funds
                ));
        },
        buyStock(state, stock) {
            axios
                .post('portfolio', stock)
                .then(response => (
                    console.log(response.data),
                    this.commit('refreshData')
                ));
        },
        refreshData(){
            this.commit('loadStocks');
            this.commit('loadPortfolio');
            this.commit('loadFunds');
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
