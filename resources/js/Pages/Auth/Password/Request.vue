<template>
    <div
        class="h-screen w-full flex flex-col items-center justify-center bg-blue"
    >
        <div class="w-full max-w-md">
            <form
                @submit.prevent="request"
                class="rounded-md bg-white shadow-xl"
            >
                <div class="px-10 py-12">
                    <div>
                        <h2
                            class="text-center font-bold text-3xl text-gray-700"
                        >
                            Forgot Password?
                        </h2>
                        <p class="mt-3 text-center text-gray-700">
                            Enter the email address associated with your account
                            and we will send you a link to reset your password.
                        </p>
                    </div>

                    <div class="mt-10">
                        <laradash-input
                            v-model="email"
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
        </div>
    </div>
</template>

<script>
import LaradashButton from '@/Shared/Button'
import LaradashInput from '@/Shared/Input'

export default {
    metaInfo: {
        title: 'Forgot Password',
    },

    components: {
        LaradashButton,
        LaradashInput,
    },

    data: () => ({
        email: '',
    }),

    methods: {
        async request() {
            await this.$inertia.post(this.$route('laradash.password.email'), {
                _token: this.$page.csrf_token,
                email: this.email,
            })

            this.email = ''
        },
    },
}
</script>
