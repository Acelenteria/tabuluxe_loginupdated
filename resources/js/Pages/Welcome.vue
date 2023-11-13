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

    <div class="bg-gradient">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen welcome bg-center selection:text-white">
            <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>
    
                <!-- <template v-else>
                    <Link :href="route('login')" class="font-semibold text-white hover:text-gray-900 dark:text-white dark:hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>
    
                    <Link v-if="canRegister" :href="route('register')" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-white dark:hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
                </template> -->
            </div>
    
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
    
                <div class="">
                    <div class="flex justify-center">
                        <Link href="/choose" class="text-white bg-blue-500 p-4 text-lg rounded-lg shadow-lg font-bold hover:bg-blue-600 hover:text-gray-200">Get Started</Link>
                        
                    </div>
                </div>
            
            </div>
        </div>
    

    </div>
</template>

<style>
.welcome {
    background-image: url('/images/bg_main.png') ;
    background-size: cover;
    
}

.bg-gradient {
    background: rgb(130,186,244);
    background: radial-gradient(circle, rgba(130,186,244,1) 6%, rgba(98,152,251,1) 45%, rgba(7,90,242,1) 100%);
}
</style>
