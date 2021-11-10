import axios from "axios";

const mutations = {
    'BUY_STOCK' (state, order) {
        axios
            .post('portfolio', order)
            .then(response => (
                console.log(response.data)
                /*this.$store.commit('loadStocks'),
                this.$store.commit('loadPortfolio'),
                this.$store.commit('loadFunds')*/
            ));
    }
};

const actions = {
    buyStock: ({commit}, order) => {
        commit('BUY_STOCK', order);

    }
};

export default {
    mutations,
    actions
};
