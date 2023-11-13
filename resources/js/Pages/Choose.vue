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
        <div v-if="canLogin" class="max-w-5xl mx-auto lg:p-8 grid grid-rows-2 gap-4">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="mx-auto text-white bg-blue-500 p-4 text-lg rounded-lg shadow-lg font-bold hover:bg-blue-600 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in as Admin</Link>

                <Link :href="route('judgelogin')" class="mx-auto text-white bg-blue-500 p-4 text-lg rounded-lg shadow-lg font-bold hover:bg-blue-600 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login as Judge</Link>
            </template>
        </div>

        <!-- <div class="max-w-7xl mx-auto p-6 lg:p-8">

            <div class="">
                <div class="flex justify-center">
                    <button class="text-white bg-blue-500 p-4 text-lg rounded-lg shadow-lg font-bold hover:bg-blue-600 hover:text-gray-200">Hello</button>
                    
                </div>
            </div>
        
        </div> -->
    </div>
</template>

<style>
.welcome {
    background-image: url('/images/bg_main.png') ;
    background-size: cover;
}
</style>
