<template>
    <div>
        <label v-if="label" class="block mb-2 text-gray-700" :for="id">
            {{ label }}
        </label>
        <input
            :id="id"
            ref="input"
            v-bind="$attrs"
            class="block border rounded w-full px-4 py-2 text-gray-700"
            :class="{
                'mb-1 focus:border-red-700': errors.length,
                'focus:border-blue': errors.length === 0,
            }"
            :type="type"
            :value="value"
            @input="$emit('input', $event.target.value)"
        />
        <div v-if="errors.length" class="text-red-700">{{ errors[0] }}</div>
    </div>
</template>

<script>
export default {
    inheritAttrs: false,
    props: {
        id: {
            type: String,
            default() {
                return `text-input-${this._uid}`
            },
        },
        type: {
            type: String,
            default: 'text',
        },
        value: String,
        label: String,
        errors: {
            type: Array,
            default: () => [],
        },
    },
    methods: {
        focus() {
            this.$refs.input.focus()
        },
        select() {
            this.$refs.input.select()
        },
    },
}
</script>
