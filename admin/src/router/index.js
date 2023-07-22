import { createRouter, createWebHistory } from "vue-router";
import HomeView from "@/views/HomeView.vue";
import AdminView from "@/views/AdminView.vue";
import UpdateView from "@/views/UpdateView.vue";
import CreateView from "@/views/CreateView.vue";
import { useAuthStore } from "@/store";

const routes = [
  {
    path: "/",
    name: "Home",
    component: HomeView,
  },
  {
    path: "/list",
    name: "Admin",
    component: AdminView,
  },
  {
    path: "/update",
    name: "AdminUpdate",
    component: UpdateView,
  },
  {
    path: "/create",
    name: "AdminCreate",
    component: CreateView,
  },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

router.beforeEach(async (to, from) => {
  const authStore = useAuthStore();
  if (authStore.user === null && to.name !== "Home") {
    return { name: "Home" };
  }
  if (authStore.user !== null && from.name !== "Home" && to.name === "Home") {
    return { name: "Admin" };
  }
});

export { router };
