<script setup>


const props = defineProps({
    event: Object,
});
</script>

<template>
  <div class="flex  text-left text-white rounded-lg px-64 py-2 bg-[#84849c] shadow-lg shadow-red-900">
    <!-- Image on the left -->
    <div class="flex-shrink-0">
      <img src="/images/image.png" alt="" class="w-[120px] h-[120px] mt-6 mr-8 rounded-full object-cover outline outline-[#ffbd59]" />
    </div>

    <div class="flex-grow cursor-pointer hover:text-[#f0b55b]">
      <div class="h-32">
        <h1 class="mt-4 mb-4 font-bold text-lg">{{ event.title }}</h1>
        <h2>{{ event.schedule }}</h2>
      </div>
      <div>
        <h3 class="mb-4">{{ event.venue }}</h3>
        <h1>{{ event.computation }}</h1>
      </div>
    </div>
  </div>
</template>
