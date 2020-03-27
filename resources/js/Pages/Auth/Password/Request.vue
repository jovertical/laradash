<template>
    <form
        @submit.prevent="request"
        class="rounded-md bg-white shadow-xl"
        novalidate
    >
        <div class="px-10 py-12">
            <div>
                <h2 class="text-center font-bold text-3xl text-gray-700">
                    Forgot Password?
                </h2>
                <p class="mt-3 text-center text-gray-700">
                    Enter the email address associated with your account and we
                    will send you a link to reset your password.
                </p>
            </div>

            <div class="mt-10">
                <laradash-input
                    v-model="form.email"
                    :errors="$page.errors.email"
                    type="email"
                    label="Email"
                />
            </div>
        </div>

        <div
            class="rounded-md flex items-center justify-between h-20 px-10 bg-gray-100"
        >
            <inertia-link
                class="text-gray-700 hover:underline"
                :href="$route('laradash.login')"
            >
                Back to Login
            </inertia-link>
            <laradash-button type="submit">
                Send Reset link
            </laradash-button>
        </div>
    </form>
</template>

<script>
import Layout from '@/Shared/AuthLayout'

export default {
    metaInfo: {
        title: 'Forgot Password',
    },

    layout: Layout,

    data: () => ({
        form: {
            email: '',
        },
    }),

    methods: {
        async request() {
            await this.$inertia.post(
                this.$route('laradash.password.email'),
                this.form,
            )
        },
    },
}
</script>
