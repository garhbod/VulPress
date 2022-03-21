<script>
export default {
    props: ["label"],
};
</script>

<template>
    <div>
        <button
            class="px-4 py-2 bg-stone-700 text-white hover:bg-stone-800 rounded"
            type="submit"
        >
            <slot></slot>
        </button>
    </div>
</template>
