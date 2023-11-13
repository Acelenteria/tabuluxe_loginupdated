<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue'
import { useForm, Link, Head } from '@inertiajs/vue3';
import { provide } from 'vue';


const props = defineProps({
    'contests': Array,
    event: Object,
})

let form = useForm({
    title: props.event.title,
    schedule: formatToYYYYMMDD(props.event.schedule),
    venue: props.event.venue,
    computation: props.event.computation,
})



function formatToYYYYMMDD(dateString) {
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Ensure double digits
    const day = String(date.getDate()).padStart(2, '0'); // Ensure double digits
    return `${year}-${month}-${day}`;
}

const submit = () => {
    form.put('/events/' + props.event.id)
}

let con_form = useForm({
    name: '',
    description: ''
})

// Function to add a contest
const addContest = () => {
    con_form.post('/events/' + props.event.id)
  
};


let eventIdToDelete = null
let eventTitleToDelete = null;

function confirmDelete(id, title) {
    eventIdToDelete = id
    eventTitleToDelete = title
}

function deleteEvent() {
        // form.delete(route('events.destroy', { event: props.event }));
        // console.log('Event data:', props.event);
        // console.log('Delete button clicked');
        form.delete(route('events.destroy', { event: eventIdToDelete }));
}

</script>

<template>
    <Head title="Contests"></Head>
    
    <AuthLayout>
        <template #header>
            
            <h2 class="font-semibold text-xl text-[#ffbd59] leading-tight">
                {{ event.title }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden border px-2 border-gray-900 shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <div class=" mt-2 flex justify-between">
                            <div class="px-6">
                                <label for="title">Event</label>
                                <input type="text" v-model="form.title" id="title" class="ml-1 mb-2 form-control rounded font-bold text-md">
                                
                                <label for="venue">Venue</label>
                                <input type="text" v-model="form.venue" id="venue" class="ml-1 mb-2 form-control rounded font-bold  text-md">
                            </div>
                            <div>
                                <label for="schedule">Schedule</label>
                                <input type="date" v-model="form.schedule" id="schedule" class="mb-2 mr-10 form-control rounded font-bold  text-md">

                                <label for="computation">Computation</label>
                                <select v-model="form.computation" id="computation" class="mb-2 form-control rounded font-bold text-md">
                                    <option value="Ranking">Ranking</option>
                                    <option value="Averaging">Averaging</option>
                                    <option value="Complex">Complex</option>
                                </select>

                            </div>
                            <div class="px-8 my-2 grid gap-y-2 grid-row-2">
                                <button class="rounded px-24 py-2 bg-green-400 font-bold" type="submit">Save</button>
                                <button class="rounded px-24 py-2 bg-red-500 font-bold"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" @click="confirmDelete(event.id, event.title)">Delete</button>
                            </div>
                        </div>
                    </form>
                    
                </div>

                <div class="flex justify-between mt-4">
                    <h1 class="px-4 py-3 text-2xl font-bold">Contests</h1>
                    <button type="button" class="bg-[#f0b55b] text-[#0c0c34] rounded px-4 py-3 text-uppercase font-bold hover:bg-[#0c0c34] hover:text-[#f0b55b] " data-bs-toggle="modal" data-bs-target="#staticConBackdrop">Add</button>
                </div>

                <div class="mt-2">
                    <table class="min-w-full divide-y divide-gray-200 border-separate border-spacing-2 border border-slate-500">
                        <thead>
                            <tr>
                                <th class="text-center px-24 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Contest</th>
                                <th class="text-center px-24 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Description</th>
                                <th class="text-center px-24 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">...</th>
                                
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-if="contests.length === 0">
                                <td colspan="3" class="text-center py-4">No Contests yet</td>
                            </tr>
                            <tr v-for="contest in contests" :key="contest.id">
                                <td class="px-6 py-4 whitespace-no-wrap border border-slate-700">{{ contest.name }}</td>    
                                <td class="px-6 py-4 whitespace-no-wrap text-center border border-slate-700">{{ contest.description }}</td>    
                                
                                <td class="px-6 py-4 whitespace-no-wrap text-center border border-slate-700">
                                    <button>
                                        <Link :href="route('contests.show', { contest: contest.id })" :active="route().current('events')">View</Link>
                                    </button>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete {{ eventTitleToDelete }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <div class="mb-3 text-center">
                                    <h1 class="text-xl">Are you sure you want to delete this Event?</h1>
                                    <h1 class="text-md text-red-500 mt-4">By confirming this, you will delete the contests inside the Event.</h1>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gray-400 btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button  class="btn bg-red-600 btn-primary" data-bs-dismiss="modal" @click="deleteEvent()">Delete</button>
                                </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="modal fade" id="staticConBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="addContest">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Contest</label>
                                    <input type="text" class="form-control rounded" id="name" v-model="con_form.name">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control rounded" id="description" v-model="con_form.description">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gray-400 btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button  class="btn bg-red-600 btn-primary" type="submit" data-bs-dismiss="modal">Add</button>
                                </div>
                            </form>
                                
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </AuthLayout>
    

</template>