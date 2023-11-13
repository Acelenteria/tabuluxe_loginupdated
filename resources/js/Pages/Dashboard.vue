<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AuthLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-[#ffbd59] leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <p>Hi</p>
                </div>
            </div>
        </div>
    </AuthLayout>
</template>
