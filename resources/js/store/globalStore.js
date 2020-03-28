function initState() {
    return {
        loading: true,
        siteName: 'Comprobante Digital',
        copyright: 'Trazzos',
        primaryDrawer: {
            model: null,
            clipped: true,
            mini: false,
        },
        footer: {
            inset: true,
        },
    }
}

const state = () => {
    return initState();
};

const mutations = {
    setLoading(state, status) {
        state.loading = status;
    },
    toggleMini(state) {
        state.primaryDrawer.mini = !state.primaryDrawer.mini
    },
    destroy (state) {
        const init = initState();
        Object.keys(init).forEach(key => {
            state[key] = init[key]
        });
    },
};

const getters = {};

const actions = {};

export default {
    name: 'globalStore',
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
