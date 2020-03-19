<template>
    <div>
        <h1>Home</h1>
        <form @submit.prevent="logout">
            <button type="submit">Logout</button>
        </form>
    </div>
</template>

<script>
import Layout from '@/Shared/Layout'

export default {
    metaInfo: {
        title: 'Home',
    },

    layout: Layout,

    methods: {
        logout() {
            this.$inertia.post(this.$route('laradash.logout'), {
                _token: this.$page.csrf_token,
            })
        },
    },
}
</script>
