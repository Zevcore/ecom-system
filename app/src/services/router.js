import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home";
import ProductsShow from "../views/ProductsShow";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    // TODO: Rozważyć zmianę z ID produktu na kebab-cased nazwę produktu, albo mix obu (id-nazwa-produktu).
    path: "/product/:id(\\d+)",
    alias: ["/product/view/:id(\\d+)"],
    name: "ProductsShow",
    component: ProductsShow,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  linkActiveClass: "active",
  linkExactActiveClass: "active",
});

export default router;
