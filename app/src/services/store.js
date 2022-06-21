import { createStore } from "vuex";
import createPersistedState from "vuex-persistedstate";

export default createStore({
  state: {
    isMobile: false,
    cartProducts: [],
    cartValue: 0,
    cartModalStatus: null,
    productToRemove: null,
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

    removeProductFromCart(state, payload) {
      state.cartProducts = state.cartProducts.filter(
        (productId) => productId !== payload.productId.toString()
      );

      state.productToRemove = null;
    },

    changeCartModalStatus(state, payload) {
      state.cartModalStatus = payload.status;

      if (payload.status === "removed" && payload.productId) {
        state.productToRemove = {
          id: payload.productId,
          value: payload.sellPrice,
        };
      }
    },

    updateCartValue(state, payload) {
      state.cartValue += Math.round(payload.value);
    },
  },

  actions: {
    addProductToCart(context, payload) {
      context.commit("addProductToCart", payload);
    },

    changeCartModalStatus(context, payload) {
      context.commit("changeCartModalStatus", payload);
    },

    removeProductFromCart(context, payload) {
      context.commit("removeProductFromCart", payload);
    },

    updateCartValue(context, payload) {
      context.commit("updateCartValue", payload);
    },
  },

  modules: {},

  plugins: [
    createPersistedState({
      storage: window.sessionStorage,
    }),
  ],
});
