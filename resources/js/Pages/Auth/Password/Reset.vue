<template>
    <form
        @submit.prevent="reset"
        class="rounded-md bg-white shadow-xl"
        novalidate
    >
        <div class="px-10 py-12">
            <div>
                <h2 class="text-center font-bold text-3xl text-gray-700">
                    Reset Password
                </h2>
            </div>

            <div class="mt-10">
                <laradash-input
                    v-model="form.email"
                    :errors="$page.errors.email"
                    type="email"
                    name="email"
                    label="Email"
                />
            </div>

            <div class="mt-5">
                <laradash-input
                    v-model="form.password"
                    :errors="$page.errors.password"
                    type="password"
                    name="password"
                    label="Password"
                />
            </div>

            <div class="mt-5">
                <laradash-input
                    v-model="form.password_confirmation"
                    :errors="$page.errors.password_confirmation"
                    type="password"
                    name="password_confirmation"
                    label="Confirm Password"
                />
            </div>
        </div>

        <div
            class="rounded-md flex items-center justify-end h-20 px-10 bg-gray-100"
        >
            <laradash-button type="submit">
                Reset Password
            </laradash-button>
        </div>
    </form>
</template>

<script>
import Layout from '@/Shared/AuthLayout'

export default {
    metaInfo: {
        title: 'Reset Password',
    },

    layout: Layout,

    props: {
        token: String,
    },

    data: () => ({
        form: {
            email: '',
            password: '',
            password_confirmation: '',
        },
    }),

    methods: {
        async reset() {
            await this.$inertia.post(this.$route('laradash.password.update'), {
                token: this.token,
                ...this.form,
            })
        },
    },
}
</script>
