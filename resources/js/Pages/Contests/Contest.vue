<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue'
import { useForm, Link, Head } from '@inertiajs/vue3';
import Judges from '@/Components/Judges.vue';

const props = defineProps({
    users : Array,
    contest: Object,
    'criterias': Array,
})

// console.log(props.contest);
// console.log(props.criterias);

let form = useForm({
    name: props.contest.name,
    description: props.contest.description,
})

const submit = () => {
    form.put('/events/contest/' + props.contest.id)
}

let crit_form = useForm({
    criteria: '',
    description: '',
    weight: '',
})

const addCriteria = () => {
    crit_form.post('/events/contest/' + props.contest.id)
};

let contestIdToDelete = null

function confirmDelete(id) {
    contestIdToDelete = id
}

function deleteContest() {
        form.delete(route('contests.destroy', { contest: contestIdToDelete }));
}



</script>

<template>
    <Head title="Contest(Setup)"></Head>
    <AuthLayout>
        <template #header>

            <h2 class="font-semibold text-xl text-[#ffbd59] leading-tight">
                {{ contest.name }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden border px-2 border-gray-900 shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <div class="flex justify-around mt-2 mb-2 grid grid-cols-3">
                                <div class="px-6">
                                    <label for="name">Contest</label>
                                    <input type="text" v-model="form.name" id="name" class="ml-1 mb-2 form-control rounded font-bold text-md">
                                </div>
                                
                                <div class="px-6">
                                    <label for="description">Description</label>
                                    <input type="text" v-model="form.description" id="description" class="ml-1 mb-2 form-control rounded font-bold  text-md">
                                </div>
                            
                            <div class="mt-2 mb-2 px-6 grid grid-cols-2 gap-x-2">
                                <button class="rounded p-16 py-3 bg-green-400 font-bold" type="submit">Save</button>
                                <button class="rounded p-16 py-3 bg-red-500 font-bold"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" @click="confirmDelete(contest.id)">Delete</button>
                                
                            </div>
                            
                        </div>
                    </form>
                </div>

                <div class="grid grid-cols-2 gap-x-6 mt-4">
                    <Judges :users="users" :contest="contest"/>
                    
                    
                    
                    
                </div>
                
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <div class="mb-3 text-center">
                                <h1 class="text-xl">Are you sure you want to delete this Event?</h1>
                                <h1 class="text-md text-gray-500 mt-4">By confirming this, you will delete the contests inside the Event</h1>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn bg-gray-400 btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button  class="btn bg-red-600 btn-primary" data-bs-dismiss="modal" @click="deleteContest()">Delete</button>
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="modal fade" id="staticCritBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Criteria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form @submit.prevent="addCriteria">
                        
                        <div class="modal-body">
                                <div class="mb-3">
                                    <label for="criteria" class="form-label">Criteria</label>
                                    <input type="text" class="form-control rounded" id="criteria" v-model="crit_form.criteria">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control rounded" id="description" v-model="crit_form.description">
                                </div>

                                <div class="mb-3">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="number" class="form-control rounded" id="weight" v-model="crit_form.weight">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gray-400 btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button  class="btn bg-red-600 btn-primary" type="submit" data-bs-dismiss="modal">Add</button>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
        

    </AuthLayout>


</template>
