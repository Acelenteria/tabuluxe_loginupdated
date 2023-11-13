<script>

</script>

<template>
    <div class="bg-white overflow-hidden border px-2 border-gray-900 shadow-xl sm:rounded-lg">
        <div class="flex justify-between mt-4">
            <h1 class="px-4 py-3 text-2xl font-bold">Criterias</h1>
            <button type="button" class="bg-[#f0b55b] text-[#0c0c34] rounded px-4 py-2 text-uppercase font-bold hover:bg-[#0c0c34] hover:text-[#f0b55b] " data-bs-toggle="modal" data-bs-target="#staticCritBackdrop">Add</button>
        </div>
        <div class="mt-2 mb-3">
            <table class="min-w-full divide-y divide-gray-200 border-separate border-spacing-2 border border-slate-500">
                <thead>
                    <tr>
                        <th class="text-center px-4 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Name</th>
                        <th class="text-center px-4 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Description</th>
                        <th class="text-center px-4 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Weight</th>
                        <th class="text-center px-4 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">...</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-if="criterias.length === 0">
                        <td colspan="3" class="text-center py-4">No criterias yet</td>
                    </tr>
                    <tr v-for="criteria in criterias" :key="criteria.id">
                        <td class="px-6 py-4 whitespace-no-wrap border border-slate-700">{{ criteria.criteria }}</td>    
                        <td class="px-6 py-4 whitespace-no-wrap text-center border border-slate-700">{{ criteria.description }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap text-center border border-slate-700">{{ criteria.weight }}</td>
                        
                        <td class="px-6 py-4 whitespace-no-wrap text-center border border-slate-700">
                            <button>
                                <Link :href="route('criterias.show', criteria.id )" :active="route().current('contests')">View</Link>
                            </button>
                        </td> 
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>