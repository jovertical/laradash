<template>
    <div class="flex">
        <nav class="w-56 h-screen bg-white border-r">
            <div class="h-20 border-b"></div>
            <ul>
                <li
                    :class="
                        $route().current() === 'home'
                            ? 'bg-blue-lightest text-blue'
                            : 'text-gray-500'
                    "
                    class="px-6 py-3"
                >
                    <inertia-link
                        :href="$route('home')"
                        class="inline-flex items-center"
                    >
                        <icon name="home" size="lg" class="mr-2" />
                        <p class="text-sm">Dashboard</p>
                    </inertia-link>
                </li>
                <li
                    :class="
                        $route().current() === 'settings'
                            ? 'bg-blue-lightest text-blue'
                            : 'text-gray-500'
                    "
                    class="px-6 py-3"
                >
                    <inertia-link
                        :href="$route('settings')"
                        class="inline-flex items-center"
                    >
                        <icon name="cog" size="lg" class="mr-2" />
                        <p class="text-sm">Settings</p>
                    </inertia-link>
                </li>
            </ul>
        </nav>
        <div class="w-full">
            <nav
                class="flex items-center justify-between h-20 px-8 bg-white border-b"
            >
                <div class="w-84">
                    <label class="inline-flex items-center w-full">
                        <icon
                            name="search"
                            class="absolute ml-3 text-gray-500"
                        />
                        <input
                            type="text"
                            class="border rounded-md w-full h-10 pl-10 pr-3 placeholder-gray-500"
                            placeholder="Search for resources..."
                        />
                    </label>
                </div>
                <div class="flex items-center">
                    <img
                        src="https://randomuser.me/api/portraits/men/32.jpg"
                        alt="Avatar"
                        class="w-10 mr-2 rounded-full"
                    />
                    <p class="mr-2">John Doe</p>
                    <icon name="chevron-down" size="lg" class="text-gray-500" />
                </div>
            </nav>
            <main class="px-12 py-8">
                <slot />
            </main>
        </div>
    </div>
</template>

<script>
import Icon from '@/Shared/Icon'

export default {
    components: {
        Icon,
    },
}
</script>
