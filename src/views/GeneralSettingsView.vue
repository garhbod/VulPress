<script setup>
import BasicTextInput from "@/components/BasicTextInput.vue";

const settings = {
    first: "",
};
</script>

<template>
    <main>
        <h1 class="text-3xl mb-4">General Settings</h1>
        <basic-text-input label="First Setting" v-model="settings.first"></basic-text-input>
        {{ settings }}
    </main>
</template>
