<template>

    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{title}}
                </h2>


            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="flex justify-between md:justify-between">
                    <Link :href="route('Characters.create')"
                    class="btn bg-green-500">Create </Link>
            <div class="form-control">
                <input type="text" v-model="term.search"  placeholder="Search"
                class="block ml-auto rounded-md mb-4 dark:bg-dark-eval-1">
            </div>
                    
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50 dark:bg-dark-eval-2 ">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Talent
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Const 
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-dark-eval-3">
                                    <tr v-for="character in characters.data" :key="character.id">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${character.icon}`"
                                                        class="h-10 w-10 rounded-full" />
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ character.name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ character.Rarity }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">{{ character.Element }}
                                            </div>
                                            <div class="avatar" v-for="data in character.Skills" :key="data">
                                                <div class="w-12 rounded-full">
                                                    <img :src="`https://enka.shinshin.moe/ui/${data}.png`">
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-white">
                                            <div class="avatar" v-for="data in character.Consts" :key="data">
                                                <div class="w-12 rounded-full">
                                                    <img :src="`https://enka.shinshin.moe/ui/${data}.png`">
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <Link :href="route('Characters.edit', { id: character.id })"
                                                class="text-indigo-600 hover:text-indigo-900 dark:text-white">Edit
                                            </Link>
                                            <Link @click="destroy(character.id)"
                                                class="text-indigo-600 hover:text-indigo-900 dark:text-white">Delete
                                            </Link>
                                            <!-- <Link href="#" class="text-indigo-600 hover:text-indigo-900">Edit</Link> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <pagination class="mt-6" :links="characters.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import {Head,useForm, Link} from '@inertiajs/inertia-vue3'
    import Pagination from '@/Components/Pagination'
    import pickBy from 'lodash/pickBy'
    import throttle from 'lodash/throttle'
    import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
    export default {
        components: {
            BreezeAuthenticatedLayout,
            Head,
            Pagination,
            Link,
        },
        props: {
            title: String,
            characters: Object,
            filters: Object,
        },
        data() {
            return {
                term: {
                    search: this.filters.search,
                },
            }
        },
        watch: {
            term: {
                deep: true,
                handler: throttle(function () {
                    this.$inertia.get(this.route('Characters.index'), pickBy(this.term), { preserveState: true })
                }, 150),
            },
        },
        methods: {
            
            submit() {
               
                this.form.post(route("Characters.store"));
            },
        draft(id){
                this.$inertia.put(route("updateDraft", id));
        },
         publish(id){
                this.$inertia.put(route("updatePublish", id));
        },
        destroy(id) {
            Swal.fire({
                title: "Are you sure ?",
                text: "You will not be able to recover this data !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Yes, delete it !",
                cancelButtonText: "No, cancel !",
                closeOnConfirm: false,
                closeOnCancel: false 
            }).then((result) => {
            if (result.value) {
                this.$inertia.delete(route("Characters.destroy", id));
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                'Cancel',
                'Data has not been deleted ! ',
                'error'
                )
            }
            })
        },
        },
    }

</script>
