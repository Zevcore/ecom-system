import { createApp } from "vue"
import App from "./App.vue"
import router from "./router"
import store from "./store"
import api from "./api"

const app = createApp(App)

app.use(store).use(router)

app.config.globalProperties.$api = api

app.mount("#app");
