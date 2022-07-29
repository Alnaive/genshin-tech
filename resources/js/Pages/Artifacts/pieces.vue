<template>
    <Head title="Art Pieces" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{title}}
                </h2>
            </div>
        </template>


        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="flex justify-between">
                <input type="text" v-model="params.search" placeholder="Search" class="block w-48 rounded-md mb-4">
            </div>
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                    <tr>
                        <th>Name</th> 
                        <th>Type</th> 
                        <th>Rarity</th> 
                        <th></th>
                    </tr>
                    </thead> 
                    <tbody>
                    <tr v-for="pcs in artifacts.data" :key="pcs.id">
                        <td>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                            <div class="w-12 h-12 mask mask-squircle">
                                <img :src="pcs.icon" >
                            </div>
                            </div> 
                            <div>
                            <div class="font-bold">
                                    {{pcs.name}}
                                </div> 
                            </div>
                        </div>
                        </td> 
                        <td>
                           {{pcs.relictype}}
                        <br> 
                        <span >{{pcs.artifact.name}}</span>
                        </td> 
                        <td>{{pcs.rarity}}</td> 
                        <th>
                        <div class="flex space-x-4">
                                <Link :href="route('Artifacts.edit', { id: pcs.id })"
                                        class="btn btn-warning dark:text-white">Edit
                                </Link>
                                <Link @click="destroy(pcs.id)"
                                        class="btn btn-error dark:text-white">Delete
                                </Link>
                            </div>
                        </th>
                    </tr>
                    </tbody> 
                </table>
                            <pagination class="mt-6" :links="artifacts.links" />

            </div>

             
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, useForm, Link } from '@inertiajs/inertia-vue3'
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
        artifacts: Object,
    },
    data(){
        return{
            params: {
                search: null,
            }
        }
    },
    setup() {
        const form = useForm({
            art_id: '',
            name: '',
            icon: null,
            type: '',
            rarity: '',
        });
        return {form};
    },
    watch: {
        params: {
            handler() {
                this.$inertia.get(this.route('Artifacts.index'), this.params, {replace: true, preserveState: true});
            },
            deep: true,
        },
    },
     methods: {
        submit(){
            if (this.$refs.Icon) {
                    this.form.icon = this.$refs.Icon.files[0];
                }
                console.log(this.form);
            this.form.post(route("Artifacts.store"));
            this.closeModal();
        },
         destroy(id) {
            this.$inertia.delete(route("Artifacts.destroy", id));
        },
         showIcon(){
                return "/storage/images/icon/artifact/";
         },
         reset: function (event) {
                this.form = {
                    art_id: null,
                    name: null,
                    icon: null,
                    type: null,
                    rarity: null,
                }
                    //   event.target.reset();

            },
          closeModal: function () {
            document.querySelector('#my-modal-2').checked = false;
              this.reset();

        },
         previewIcon(e) {
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
         },
         
    },
}
</script>
