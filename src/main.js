import { createApp } from "vue";
import PluginSettingsVue from "./PluginSettings.vue";
import router from "./router";

const pluginSettings = createApp(PluginSettingsVue);

pluginSettings.use(router);

pluginSettings.mount("#plugin-settings");
