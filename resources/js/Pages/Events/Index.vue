<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import EventsCard from '@/Components/EventsCard.vue';
import { useForm, Link, Head } from '@inertiajs/vue3';

const props = defineProps({
    'events': Array,
})

let form = useForm({
    title: '',
    schedule: '',
    venue: '',
    computation: '',
})

const formatDate = (dateString) => {
    const date = new Date(dateString);
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('en-US', options);
};

const submit = () => {
    form.post('/events')
    form.reset();
}

</script>

<template>
    <Head title="Events"></Head>
    <AuthLayout title="Events">
        <template #header>
            <h2 class="font-semibold text-xl text-[#ffbd59] leading-tight">
                Events
            </h2>
        </template>
        <div class="flex mt-8 ">
            <div class="max-w-5xl min-w-min mx-auto ">
                <div class="flex justify-end">
                    <button type="button" class="bg-[#f0b55b] text-[#0c0c34] rounded p-3 hover:bg-[#0c0c34] hover:text-[#f0b55b] " data-bs-toggle="modal" data-bs-target="#staticBackdrop">ADD</button>
                </div>
                
                <div class="mt-4">
                    <table class="min-w-full divide-y divide-gray-200 border-separate border-spacing-2 border border-slate-500 mb-8">
                        <thead>
                            <tr class="text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">
                                <th class="px-24 py-3">Name</th>
                                <th class="px-24 py-3">Schedule</th>
                                <th class="px-24 py-3">Venue</th>
                                <th class="px-24 py-3">Computation Method</th>
                                <th class="px-24 py-3">...</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="event in events" :key="event.id" class="whitespace-no-wrap">
                                <td class="px-6 py-4 border border-slate-700">{{ event.title }}</td>    
                                <td class="px-6 py-4 text-center border border-slate-700">{{ formatDate(event.schedule) }}</td>    
                                <td class="px-6 py-4 border border-slate-700">{{ event.venue }}</td>    
                                <td class="px-6 py-4 border border-slate-700">{{ event.computation }}</td> 
                                <td class="px-6 py-4 text-center border border-slate-700">
                                    <button>
                                        <Link :href="route('events.show', { event: event.id })" :active="route().current('events')">View</Link>
                                    </button>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="submit">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Event Title</label>
                                        <input type="text" class="form-control rounded" id="title" v-model="form.title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="schedule" class="form-label">Event Schedule</label>
                                        <input type="date" class="form-control rounded" id="schedule" v-model="form.schedule">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="venue" class="form-label">Event Venue</label>
                                        <input type="text" class="form-control rounded" id="venue" v-model="form.venue">
                                    </div>
                                    <div class="mb-3">
                                        <label for="computation" class="form-label">Select Computation</label>
                                        <select class="form-select rounded" id="computation" v-model="form.computation" placeholder="Select a Computation Method">
                                            <option value="">Select a computation method</option>
                                            <option value="Ranking">Ranking</option>
                                            <option value="Averaging">Averaging</option>
                                            <option value="Complex">Complex</option>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gray-400 btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button  class="btn bg-blue-500 btn-primary" type="submit" data-bs-dismiss="modal">Save</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </AuthLayout>
</template>