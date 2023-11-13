<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen welcome bg-center dark:bg-blue-400 selection:text-white">
        <div v-if="canLogin" class="mx-auto">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>

            <template v-else>
                <!-- <Link :href="route('login')" class="mx-auto text-white bg-blue-500 p-4 text-lg rounded-lg shadow-lg font-bold hover:bg-blue-600 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in as Admin</Link> -->
                <div class="bg-blue-500 p-16 px-24 py-12 rounded-lg shadow">
                    <div class="grid grid-rows-3 mx-auto gap-2">
                        <h4 class="text-center font-bold text-3xl text-white">Login as Judge</h4>
                        <input class="rounded rounded-lg p-2 mt-6" type="text">
                        <Link href="route('loginAsJudge')" class="border border-black mx-auto text-white bg-blue-500 p-4 text-lg rounded-lg shadow-lg font-bold hover:bg-blue-600 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login as Judge</Link>
                    </div>
                </div>
                
                </template>
        </div>

    </div>
</template>

<style>
.welcome {
    background-image: url('/images/bg_main.png') ;
    background-size: cover;
}
</style>
