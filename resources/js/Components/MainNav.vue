<script setup>
import { Link } from '@inertiajs/vue3';
// import { defineProps } from 'vue';

const {hidden} = defineProps (['hidden'])

</script>

<template>

    <div class="main-nav">
        <Link :href="route('dashboard')" :active="route().current('dashboard')">
            <i class="fa fa-home"></i> <span :hidden="hidden">Dashboard</span>
        </Link>
        <Link :href="route('events')" :active="route().current('events')">
            <i class="fa fa-home"></i> <span :hidden="hidden">Events</span>
        </Link>
        <Link :href="route('logout')" method="post" title="Logout">
            <i class="fa-solid fa-right-from-bracket"></i> <span :hidden="hidden">Logout</span>
        </Link>
    </div>

</template>