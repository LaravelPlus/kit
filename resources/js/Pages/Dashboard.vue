<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

// Props from Inertia
// defineProps({
//     teams: Array,
//     navbar: Object,
//     user: Object,
//     errors: Object,
// });

defineProps<{
    teams: array;
    navbar: array;
    auth?: object;
    errors?: object;
}>();
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout :auth="auth" :navbar="navbar">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        You're logged in!
                    </div>
                </div>

                <!-- Display teams -->
                <div class="mt-6">
                    <h3 class="text-lg font-semibold">Your Teams:</h3>
                    <ul>
                        <li v-for="team in teams" :key="team.id" class="mt-2">
                            <a :href="'/teams/' + team.slug" class="text-blue-500 hover:underline">
                                {{ team.name }}
                            </a>
                        </li>
                    </ul>
                    <p v-if="!teams.length" class="text-gray-500">You are not part of any teams yet.</p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
