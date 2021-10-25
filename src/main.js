import { createApp } from "vue";
import App from "./template/App.vue";
import router from "./router/index";
import "./index.css";

createApp(App).use(router).mount("#app");
