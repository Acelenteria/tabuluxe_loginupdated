<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue'
import { useForm, Link, Head } from '@inertiajs/vue3';

const props = defineProps({
    criteria : Object,
})

let form = useForm({
    criteria: props.criteria.criteria,
    description: props.criteria.description,
    weight: props.criteria.weight,
})

const submit = () => {
    form.put('/events/contest/criteria/' + props.criteria.id)
}

let criteriaIdToDelete = null

function confirmDelete(id) {
    criteriaIdToDelete = id
}

function deleteCriteria() {
        form.delete(route('criterias.destroy', { criteria: criteriaIdToDelete }));
}

</script>

<template>
    <Head title="Criteria"></Head>
    <AuthLayout>
        <template #header>

            <h2 class="font-semibold text-xl text-[#ffbd59] leading-tight">
                {{ criteria.criteria }}
            </h2>
        </template>

        <div class="py-24">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden border px-2 border-gray-900 shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <div class="mt-2 mb-2">
                            <div class="p-6">
                                <label for="criteria">Criteria</label>
                                <input type="text" v-model="form.criteria" id="criteria" class="ml-1 mb-2 form-control rounded font-bold text-md">
                            
                                <label for="description">Description</label>
                                <input type="text" v-model="form.description" id="description" class="ml-1 mb-2 form-control rounded font-bold  text-md">

                                <label for="weight">Weight</label>
                                <input type="text" v-model="form.weight" id="weight" class="ml-1 mb-2 form-control rounded font-bold  text-md">
                            </div>
                                    
                            
                            <div class="mt-2 mb-4 px-6 grid grid-cols-2 gap-x-2 ">
                                <button class="rounded p-8 py-3 bg-green-400 font-bold" type="submit">Save</button>
                                <button class="rounded p-8 py-3 bg-red-500 font-bold"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" @click="confirmDelete(criteria.id)">Delete</button>
                                
                            </div>
                            
                        </div>
                    </form>
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
                                <button  class="btn bg-red-600 btn-primary" data-bs-dismiss="modal" @click="deleteCriteria()">Delete</button>
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </AuthLayout>
</template>