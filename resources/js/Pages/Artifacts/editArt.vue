<template>
    <head>
        <title>Edit Artifact</title>
    </head>
    <BreezeAuthenticatedLayout>
     <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Edit Artifact
                </h2>

                
            </div>
        </template>
        <div class="card bg-white dark:bg-dark-eval-1">
            <form @submit.prevent="update()" class="ml-5 mr-5 mb-5 grid-cols-4">
                <div class="form-control ">
                    <label class="label">Name</label>
                    <input type="text" class="input input-borderer w-2/4 bg-base-content text-dark dark:bg-base-100 dark:text-white" placeholder="Name" v-model="form.name">
                </div>
                <div class="form-control">
                    <label class="label">Icon</label>
                    <img  :src="showIcon() + art.icon" class="avatar w-24 h-24"/>
                    <input type="file" @change="previewIcon" ref="Icon"/>
                    <img v-if="url" :src="url" class="avatar w-24 h-24"/>
                </div>
                <div class="form-control ">
                    <label class="label">2 Set Piece Effect</label>
                     <textarea class="textarea h-24 w-2/4 bg-base-content text-dark dark:bg-base-100 dark:text-white" placeholder="Set Effect" v-model="form.set_effect1"></textarea>
                </div>
                <div class="form-control ">
                    <label class="label">4 Set Piece Effect</label>
                     <textarea class="textarea h-24 w-2/4 bg-base-content text-dark dark:bg-base-100 dark:text-white" placeholder="Set Effect" v-model="form.set_effect2"></textarea>
                </div>
                <div class="form-control ">
                    <label class="label">Rarity</label>
                    <input type="text" class="input input-borderer w-2/4 bg-base-content text-dark dark:bg-base-100 dark:text-white" placeholder="Name" v-model="form.rarity">
                </div>
                <br>
                    <button for="my-modal-2" class="btn btn-success">Update</button>
            </form>
        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
export default {
    components:{
        Head, Link,
        BreezeAuthenticatedLayout,
    },
    props:{
        art: Object,
    },
    setup(props){
         const form = useForm({
             _method: 'put',
            name: props.art.name,
            icon: props.art.icon,
            set_effect1: props.art.set_effect1,
            set_effect2: props.art.set_effect2,
            rarity: props.art.rarity,
        });
        return {form};
    },
     methods: {
        update() {
             if (this.$refs.Icon) {
                    this.form.icon = this.$refs.Icon.files[0];
                }
            this.$inertia.post(route('updateArt', this.art.id), this.form)
            console.log(this.form);
        },
         previewIcon(e) {
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
         },
         showIcon(){
                return "/storage/images/icon/art/";
         }
    },
}
</script>