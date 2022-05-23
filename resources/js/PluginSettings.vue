<script setup>
import { RouterLink, RouterView } from "vue-router";
import { usePluginConfig } from "@/js/composables/usePluginConfig";
const pluginConfig = usePluginConfig();
</script>

<template>
    <div class="vulpress-app">
        <div class="bg-white m-4 ml-0">
            <header class="grid grid-cols-2 gap-2">
                <div class="flex flex-no-wrap justify-end">
                    <div class="p-8">
                        <img
                            alt="Vue logo"
                            :src="`${pluginConfig.plugin_dir_url}/images/logo.svg`"
                            width="125"
                            height="125"
                        />
                    </div>
                </div>
                <div class="flex flex-no-wrap justify-start items-center">
                    <h1 class="text-4xl">Vulpress Starter Plugin</h1>
                </div>
            </header>
            <div class="grid grid-cols-12 gap-2">
                <div
                    class="col-span-12 lg:col-span-3 md:col-span-4 sm:col-span-5"
                >
                    <div class="p-4 sm:p-8">
                        <nav class="bg-zinc-100 rounded-md">
                            <h3
                                class="text-white text-xl font-medium bg-sky-800 font-heading px-3 py-2 rounded-md"
                            >
                                Settings
                            </h3>
                            <router-link
                                class="text-slate-700 mx-3 block py-3 border-b border-zinc-200 hover:text-sky-600"
                                active-class="text-sky-700"
                                to="/"
                            >
                                General
                            </router-link>
                            <router-link
                                class="text-slate-700 mx-3 block py-3 border-b border-zinc-200 hover:text-sky-600"
                                active-class="text-sky-700"
                                to="/advanced"
                            >
                                Advanced
                            </router-link>
                        </nav>
                    </div>
                </div>
                <div
                    class="col-span-12 lg:col-span-9 md:col-span-8 sm:col-span-7 p-4 sm:py-8 sm:pl-2 sm:pr-8"
                >
                    <router-view />
                </div>
            </div>
        </div>
    </div>
</template>
