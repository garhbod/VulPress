import { createApp } from "vue";
import PluginSettingsVue from "./PluginSettings.vue";
import router from "./router";
import "@/assets/base.css";

const pluginSettings = createApp(PluginSettingsVue);

pluginSettings.use(router);

pluginSettings.mount("#plugin-settings");
