import { createRouter, createWebHashHistory } from "vue-router";
import GeneralSettingsView from "../views/GeneralSettingsView.vue";

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: "/",
            name: "home",
            component: GeneralSettingsView,
        },
        {
            path: "/advanced",
            name: "advanced",
            // route level code-splitting
            // this generates a separate chunk (About.[hash].js) for this route
            // which is lazy-loaded when the route is visited.
            component: () => import("../views/AdvancedSettingsView.vue"),
        },
    ],
});

export default router;
