import {createApp} from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "./axios";

// import "./assets/main.css";
import "./index.css";

const app = createApp(App);

app.config.globalProperties.$appName = "Ecom-CMS";
app.config.globalProperties.$api = axios;

app.use(router);

app.mount("#app");
