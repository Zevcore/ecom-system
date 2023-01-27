import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import ProductsIndex from "../views/ProductsIndex.vue";
import OrdersIndex from "../views/OrdersIndex.vue";
import UsersIndex from "../views/UsersIndex.vue";

const routes = [
  {
    path: "/",
    name: "Panel główny",
    component: Dashboard,
  },
  // {
  //   path: "/product/:id(\\d+)",
  //   alias: ["/product/view/:id(\\d+)"],
  //   name: "Produkt",
  //   component: ProductsShow,
  // },
  {
    path: "/products/:page(\\d+)?",
    alias: ["/product/index/:page(\\d+)?"],
    name: "Produkty",
    component: ProductsIndex,
  },
  {
    path: "/orders/:page(\\d+)?",
    alias: ["/order/index/:page(\\d+)?"],
    name: "Zamówienia",
    component: OrdersIndex,
  },
  {
    path: "/users/:page(\\d+)?",
    alias: ["/users/index/:page(\\d+)?"],
    name: "Użytkownicy",
    component: UsersIndex,
  },
  // {
  //   path: "/order/:id(\\d+)",
  //   alias: ["/order/view/:id(\\d+)"],
  //   name: "Zamówienie",
  //   component: ProductsShow,
  // },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior() {
    return { top: 0, behavior: "smooth" };
  },
  linkActiveClass: "active",
  linkExactActiveClass: "active",
});

export default router;
