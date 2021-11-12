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
        funds: 0,
        user: false
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
        loadUser(state) {
            axios
                .get('user/' + this.state.user.id)
                .then(response => (
                    console.log(response),
                    state.user = response.data
                ));
        },
        setUser(state, user){
            state.user = user;
        },
        refreshData(){
            this.commit('loadStocks');
            this.commit('loadPortfolio');
            this.commit('loadUser');
        },
        clearData(state){
            state.stocks = [];
            state.portfolio = [];
            state.funds = 0;
            state.user = false;
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
