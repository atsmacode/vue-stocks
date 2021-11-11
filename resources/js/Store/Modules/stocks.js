import axios from "axios";

const actions = {
    buyStock: ({commit}, order) => {
        axios
            .post('stock/order', order)
            .then(response => (
                console.log(response.data),
                commit('refreshData')
            ));
    },
    sellStock: ({commit}, order) => {

        console.log(order);
        axios
            .post('stock/sell', order)
            .then(response => (
                console.log(response),
                    commit('refreshData')
            ));
    }
};

export default {
    actions
};
