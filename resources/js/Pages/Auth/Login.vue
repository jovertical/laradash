<template>
    <div
        class="h-screen w-full flex flex-col items-center justify-center bg-blue"
    >
        <div class="w-full max-w-md">
            <form @submit.prevent="login" class="rounded-md bg-white shadow-xl">
                <div class="px-10 py-12">
                    <div>
                        <h2
                            class="text-center font-bold text-3xl text-gray-700"
                        >
                            Welcome back!
                        </h2>
                    </div>

                    <div class="mt-10">
                        <text-input
                            v-model="email"
                            :errors="$page.errors.email"
                            type="email"
                            label="Email"
                        />
                    </div>

                    <div class="mt-5">
                        <text-input
                            v-model="password"
                            :errors="$page.errors.password"
                            type="password"
                            label="Password"
                        />
                    </div>

                    <label
                        for="remember"
                        class="mt-6 select-none flex items-center"
                    >
                        <input id="remember" type="checkbox" class="mr-1" />
                        <span class="text-sm">Remember Me</span>
                    </label>
                </div>

                <div
                    class="rounded-md flex items-center justify-between h-20 px-10 bg-gray-100"
                >
                    <inertia-link
                        class="text-gray-700 hover:underline"
                        :href="$route('laradash.home')"
                    >
                        Forgot password?
                    </inertia-link>
                    <button
                        type="submit"
                        class="bg-blue text-white rounded-md h-10 px-4"
                    >
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import TextInput from '@/Shared/TextInput'

export default {
    metaInfo: {
        title: 'Login',
    },

    components: {
        TextInput,
    },

    data: () => ({
        email: '',
        password: '',
    }),

    methods: {
        login() {
            this.$inertia.post(this.$route('laradash.login'), {
                _token: this.$page.csrf_token,
                email: this.email,
                password: this.password,
            })
        },
    },
}
</script>
