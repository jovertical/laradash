<template>
    <form
        @submit.prevent="login"
        class="rounded-md bg-white shadow-xl"
        novalidate
    >
        <div class="px-10 py-12">
            <div>
                <h2 class="text-center font-bold text-3xl text-gray-700">
                    Welcome back!
                </h2>
            </div>

            <div class="mt-10">
                <laradash-input
                    v-model="form.email"
                    :errors="$page.errors.email"
                    type="email"
                    label="Email"
                />
            </div>

            <div class="mt-5">
                <laradash-input
                    v-model="form.password"
                    :errors="$page.errors.password"
                    type="password"
                    label="Password"
                />
            </div>

            <label for="remember" class="mt-6 select-none flex items-center">
                <input
                    v-model="form.remember"
                    id="remember"
                    type="checkbox"
                    class="mr-1"
                />
                <span class="text-sm">Remember Me</span>
            </label>
        </div>

        <div
            class="rounded-md flex items-center justify-between h-20 px-10 bg-gray-100"
        >
            <inertia-link
                class="text-gray-700 hover:underline"
                :href="$route('laradash.password.request')"
            >
                Forgot password?
            </inertia-link>
            <laradash-button type="submit">
                Login
            </laradash-button>
        </div>
    </form>
</template>

<script>
import Layout from '@/Shared/AuthLayout'

export default {
    metaInfo: {
        title: 'Login',
    },

    layout: Layout,

    data: () => ({
        form: {
            email: '',
            password: '',
            remember: null,
        },
    }),

    methods: {
        login() {
            this.$inertia.post(this.$route('laradash.login'), this.form)
        },
    },
}
</script>
