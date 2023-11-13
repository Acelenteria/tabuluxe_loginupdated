<script setup>
    import MainNav from '@/Components/MainNav.vue'
    import { ref } from 'vue';
    // import { Link } from '@inertiajs/vue3';

    let width = ref('w-[250px]')
    let hide = ref(false)

    function toggleWidth() {
        if(width.value == 'w-[250px]') {
            width.value = 'w-[100px]'
            hide.value = true
        }else {
            width.value = ['w-[250px]']
            hide.value = false
        }
    }

    const logout = () => {
        router.post(route('logout'));
    };
    
</script>

<template>

    <div class="flex min-h-screen">
        <div id="sidebar" class="bg-[#080d32] p-6 duration-500" :class="width" style="position: relative;">
            <button class="text-xl text-[#ffbd59] shadow" @click="toggleWidth" style="position: absolute; right: 10px; top:10px">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div id="branding" :hidden="hide">
                <img src="/images/logo.png" alt="Logo"
                    class="w-[170px] h-[170px] mx-auto rounded-full object-cover outline outline-[#ffbd59]">
                <h1 class="text-4xl text-center text-gray-200 my-6 font-bold" id="nav-title">T<span class="text-2xl">ABU</span><span id="title_1">L<span class="text-2xl">UXE</span></span></h1>

            </div>
            <hr class="border-[#ffbd59]" :hidden="hide">


            <MainNav :hidden="hide" ></MainNav>
        </div>
        <div id="container" class="flex-1" >
            <header v-if="$slots.header" class="bg-[#424464] shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>
            <slot />
        </div>
    </div>

</template>

<style>


</style>