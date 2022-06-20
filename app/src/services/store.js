import { createStore } from "vuex";
import createPersistedState from "vuex-persistedstate";

export default createStore({
  state: {
    isMobile: false,
    cartProducts: [],
  },

  getters: {
    cartProductsCount(state) {
      return state.cartProducts.length;
    },

    isProductInCart: (state) => (productId) => {
      return state.cartProducts.includes(productId);
    },
  },

  mutations: {
    setIsMobile(state, isMobile) {
      state.isMobile = isMobile;
    },

    addProductToCart(state, payload) {
      state.cartProducts.push(payload.productId);
    },
  },

  actions: {
    addProductToCart(context, payload) {
      context.commit("addProductToCart", payload);
    },
  },

  modules: {},

  plugins: [
    createPersistedState({
      storage: window.sessionStorage,
    }),
  ],
});
