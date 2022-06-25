import { createRouter, createWebHistory } from "vue-router";
import Home from "@/views/Home";
import ProductsShow from "@/views/ProductsShow";
import Cart from "@/views/Cart";
import ProductsIndex from "@/views/ProductsIndex";
import OrdersCreate from "@/views/OrdersCreate";

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
    path: "/products/:page(\\d+)?",
    alias: ["/product/index/:page(\\d+)?"],
    name: "ProductsIndex",
    component: ProductsIndex,
  },
  {
    path: "/cart",
    name: "Cart",
    component: Cart,
  },
  {
    path: "/order/create",
    name: "OrdersCreate",
    component: OrdersCreate,
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
