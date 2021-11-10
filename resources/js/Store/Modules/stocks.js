import axios from "axios";

const actions = {
    buyStock: ({commit}, order) => {
        axios
            .post('portfolio', order)
            .then(response => (
                console.log(response.data),
                commit('refreshData')
            ));
    },
    sellStock: ({commit}, stock_id) => {
        axios
            .delete('portfolio' + '/' + stock_id)
            .then(response => (
                console.log(response.data),
                    commit('refreshData')
            ));
    }
};

export default {
    actions
};
