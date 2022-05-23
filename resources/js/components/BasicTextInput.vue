<script>
export default {
    props: ["label", "modelValue"],
    methods: {
        updateValue(event) {
            this.$emit("update:modelValue", event.target.value);
        },
    },
};
</script>

<template>
    <div class="flex flex-col mb-4">
        <label class="text-lg mb-2">{{ label }}</label>
        <div>
            <input
                class="px-4 py-2 w-96"
                type="text"
                :value="modelValue"
                @input="updateValue"
            />
        </div>
    </div>
</template>
