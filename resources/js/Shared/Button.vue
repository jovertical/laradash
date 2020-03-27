<template>
    <button
        :id="id"
        ref="button"
        class="relative inline-flex items-center text-white rounded-md h-10 px-4"
        :class="{
            'bg-indigo-600 hover:bg-indigo-500': variant === 'primary',
        }"
    >
        <slot />
    </button>
</template>

<script>
export default {
    props: {
        id: {
            type: String,
            default() {
                return `button-${this._uid}`
            },
        },
        type: {
            type: String,
            default: 'button',
        },
        variant: {
            type: String,
            default: 'primary',
        },
        loading: {
            type: Boolean,
            default: false,
        },
    },
}
</script>
