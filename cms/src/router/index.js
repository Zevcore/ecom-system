import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import ProductsIndex from "../views/ProductsIndex.vue";
import OrdersIndex from "../views/OrdersIndex.vue";
import UsersIndex from "../views/UsersIndex.vue";
import ProductsShow from "../views/ProductsShow.vue";
import OrdersShow from "../views/OrdersShow.vue";
import ProductsEdit from "../views/ProductsEdit.vue";
import OrdersEdit from "../views/OrdersEdit.vue";
import ProductsCreate from "../views/ProductsCreate.vue";
import OrdersCreate from "../views/OrdersCreate.vue";
import DeleteItem from "../views/DeleteItem.vue";

const routes = [
  {
    path: "/",
    name: "Panel główny",
    component: Dashboard,
  },
  {
    path: "/products/:id(\\d+)",
    alias: ["/products/:id(\\d+)/show"],
    name: "Produkt",
    component: ProductsShow,
  },
  {
    path: "/products/:id(\\d+)/edit",
    alias: ["/products/:id(\\d+)/edit"],
    name: "Edycja produktu",
    component: ProductsEdit,
  },
  {
    path: "/products/create",
    name: "Utwórz produkt",
    component: ProductsCreate,
  },
  {
    path: "/products/:page(\\d+)?",
    alias: ["/product/index/:page(\\d+)?"],
    name: "Produkty",
    component: ProductsIndex,
  },
  {
    path: "/orders/:id(\\d+)",
    alias: ["/orders/:id(\\d+)/show"],
    name: "Zamówienie",
    component: OrdersShow,
  },
  {
    path: "/orders/:id(\\d+)/edit",
    alias: ["/orders/:id(\\d+)/edit"],
    name: "Edycja zamówienia",
    component: OrdersEdit,
  },
  {
    path: "/orders/create",
    name: "Utwórz zamówienie",
    component: OrdersCreate,
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
  {
    path: "/:table(\\w+)/:id(\\d+)/delete",
    name: "Usuń element",
    component: DeleteItem,
  },
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
