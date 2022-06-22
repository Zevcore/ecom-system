import { createRouter, createWebHistory } from "vue-router";
import Home from "@/views/Home";
import ProductsShow from "@/views/ProductsShow";
import Cart from "@/views/Cart";

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
  {
    path: "/cart",
    name: "Cart",
    component: Cart,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  scrollBehavior() {
    return { top: 0, behavior: "smooth" };
  },
  linkActiveClass: "active",
  linkExactActiveClass: "active",
});

export default router;
