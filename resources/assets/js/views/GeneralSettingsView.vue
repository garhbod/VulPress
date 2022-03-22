<script setup>
/* globals jQuery */
import { ref, unref, onMounted } from "vue";
import BasicTextInput from "@/js/components/BasicTextInput.vue";
import SubmitButton from "@/js/components/SubmitButton.vue";
import { usePluginConfig } from "@/js/composables/usePluginConfig";
const pluginConfig = usePluginConfig();

const settings = ref({
    first: "",
});

onMounted(() => {
    jQuery.post(
        pluginConfig.value.ajax_url,
        {
            action: pluginConfig.value.ajax_get_action,
        },
        function (response) {
            settings.value = response
            console.log(response);
        },
        "json"
    );
});

const submitForm = () => {
    jQuery.post(
        pluginConfig.value.ajax_url,
        {
            action: pluginConfig.value.ajax_store_action,
            settings: unref(settings),
        },
        function (response) {
            console.log(response, response.updated, !!response.tisjd);
        },
        "json"
    );
};
</script>

<template>
    <main>
        <h1 class="text-3xl mb-4">General Settings</h1>
        <form @submit.prevent="submitForm">
            <basic-text-input
                label="First Setting"
                v-model="settings.first"
            ></basic-text-input>
            <div>
                <submit-button>Save</submit-button>
            </div>
        </form>
    </main>
</template>
