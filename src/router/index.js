import { createRouter, createWebHashHistory } from "vue-router";
import Home from "../views/Home.vue";
import UserDetails from "../views/UserDetails.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/profile/:id",
    name: "UserDetails",
    component: UserDetails,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
