<template>
    <Head title="Profile" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{title}}
                </h2>

                
            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="grid grid-cols-4">
            <input type="text" v-model="params.search" placeholder="Search" class="block w-full rounded-md mb-4">
            </div>
             <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Role
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="user in users.data" :key="user.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                     <img
                                            :src="showImage() + user.image"
                                            class="h-10 w-10 rounded-full"
                                        />
                                </div>
                                <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ user.name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ user.email }}
                                </div>
                                </div>
                            </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ user.about }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ user.role }}
                            </td>
                            <td  class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <Link :href="route('profileShow', { id: user.id })" class="text-indigo-600 hover:text-indigo-900">Detail</Link>

                                <div v-if="user.name ==  $page.props.auth.user.name ">
                                    <Link :href="route('profileEdit', { id: user.id })" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
                                    
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                     <pagination class="mt-6" :links="users.links" />

                    </div>
                </div>
                </div>
            </div>
             
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

import Pagination from '@/Components/Pagination'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        Pagination,
    },
    props: {
        title: String,
        users: Object,
    },
    data(){
        return{
            params: {
                search: null,
            }

        }
    },
    methods: {
        showImage() {
            return "/storage/";
        },
    },
    watch: {
        params: {
            handler() {
                this.$inertia.get(this.route('Characters.index'), this.params, {replace: true, preserveState: true});
            },
            deep: true,
        },
    },
}
</script>
