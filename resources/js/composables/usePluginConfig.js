import { computed } from "vue";

/**
 * Whatever is set in AdminSettingsController@getPluginConfig will be available in this object
 **/
export function usePluginConfig() {
    return computed(() => window.vulpress_config || {});
}
