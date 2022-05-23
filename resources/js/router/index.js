import { createRouter, createWebHashHistory } from "vue-router";
import GeneralSettingsView from "../views/GeneralSettingsView.vue";
import AdvancedSettingsView from "../views/AdvancedSettingsView.vue";

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
            component: AdvancedSettingsView,
        },
    ],
});

export default router;
