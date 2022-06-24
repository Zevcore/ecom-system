import { createApp } from "vue";
import App from "./App.vue";

// Services
import router from "./services/router.js";
import store from "./services/store.js";
import api from "./helpers/api.js";

// Plugins
import VueClickAwayPlugin from "vue3-click-away";

// Bootstrap
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap-icons/font/bootstrap-icons.css";

const app = createApp(App);
app.use(store).use(router).use(VueClickAwayPlugin);

app.config.globalProperties.$api = api;
app.config.globalProperties.$appName = "Ecom-system";

app.mount("#app");
