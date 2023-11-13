<script setup>
import { useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
    rounds: Array,
    contest: Object
})

const form = useForm({
    name: '',
    passcode: ''
})

function addRound() {
    form.post('/events/contest/' + props.contest.id)
}


</script>

<template>
    <div class="bg-white overflow-hidden border px-2 border-gray-900 shadow-xl sm:rounded-lg">
        <div class="flex justify-between mt-4">
            <h1 class="px-4 py-3 text-2xl font-bold">Rounds</h1>
            <button type="button" class="bg-[#f0b55b] text-[#0c0c34] rounded px-4 py-2 text-uppercase font-bold hover:bg-[#0c0c34] hover:text-[#f0b55b] " data-bs-toggle="modal" data-bs-target="#staticroundBackdrop">Add</button>
        </div>
        
        <div class="mt-2">
            <table class="min-w-full divide-y divide-gray-200 border-separate border-spacing-2 border border-slate-500 rounded">
                <thead>
                    <tr>
                        <th class="text-center px-4 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Name</th>
                        <th class="text-center px-4 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Passcode</th>
                        <th class="text-center px-4 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">...</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-if="rounds.length === 0">
                        <td colspan="3" class="text-center py-4">No rounds yet</td>
                    </tr>
                    <tr v-for="round in rounds" :key="round.id">
                        <td class="px-6 py-4 whitespace-no-wrap border border-slate-700">{{ round.name }}</td>    
                        <td class="whitespace-no-wrap text-center border border-slate-700">{{ round.passcode }}</td>
                        
                        <td class="whitespace-no-wrap text-center border border-slate-700">
                            <button>
                                <Link :href="route('contests.show', round.id )" :active="route().current('events')">View</Link>
                            </button>
                        </td> 
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="staticroundBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Round</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="addRound">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control rounded" id="name" v-model="form.name">
                        </div>

                        <label for="passcode" class="form-label">Passcode</label>
                        <div class="mb-3 flex gap-x-2">
                            <input type="text" class="form-control rounded" id="passcode" v-model="form.passcode">
                            <button class="btn-primary bg-blue-500 rounded-lg text-white p-2 " @click="generateRandomPasscode">Generate Passcode</button>
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
</template>