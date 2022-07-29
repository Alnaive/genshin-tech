<template>
    <head>
        <title>Edit Artifact Pieces</title>
    </head>
    <BreezeAuthenticatedLayout>
     <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Edit Artifact Pieces
                </h2>
            </div>
        </template>
        <div class="card bg-white dark:bg-dark-eval-1">
            <form @submit.prevent="update()" class="ml-5 mr-5 mb-5 grid-cols-4">
                <div class="form-control ">
                    <label class="label">Set</label>
                    <select class="select select-bordered w-full max-w-xs" v-model="form.art_id">
                        <option selected="selected"  :value="form.art_id"> 
                             <div v-for="art in arts" :key="art.id">
                                <p v-if="art.id == form.art_id">
                                    {{art.name}}
                                </p>
                            </div>    
                        </option> 
                        <option v-for="data in arts" :key="data.id" :value="data.id"> {{data.name}} </option> 
                    </select>
                </div>
                <div class="form-control ">
                    <label class="label">Name</label>
                    <input type="text" class="input input-borderer w-2/4 bg-base-content text-dark dark:bg-base-100 dark:text-white" placeholder="Name" v-model="form.name">
                </div>
                <div class="form-control">
                    <label class="label">Icon</label>
                    <img  :src="showIcon() + artifact.icon" class="avatar w-24 h-24"/>
                    <input type="file" @change="previewIcon" ref="Icon"/>
                    <img v-if="url" :src="url" class="avatar w-24 h-24"/>
                </div>
                <div class="form-control">
                    <label class="label">Type</label>
                    <select class="select select-bordered w-full max-w-xs" v-model="form.type">
                        <option value="flower">Flower</option>
                        <option value="plume">Plume</option>
                        <option value="sand">Sand</option>
                        <option value="goblet">Goblet</option>
                        <option value="circlet">Circlet</option>
                    </select>
                </div>
                 <div class="form-control">
                    <label class="label">Rarity</label>
                    <select class="select select-bordered w-full max-w-xs" v-model="form.rarity">
                        <option value="5 Star">5 Star</option>
                        <option value="4 Star">4 Star</option>
                        <option value="3 Star">3 Star</option>
                        <option value="2 Star">2 Star</option>
                        <option value="1 Star">1 Star</option>
                    </select>
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
        artifact: Object,
        arts: Object,
    },
   setup(props) {
        const form = useForm({
              _method: 'put',
            art_id: props.artifact.art_id,
            name: props.artifact.name,
            icon: props.artifact.icon,
            type: props.artifact.type,
            rarity: props.artifact.rarity,
        });

        return { form };
    },
     methods: {
        update() {
             if (this.$refs.Icon) {
                    this.form.icon = this.$refs.Icon.files[0];
                }
            this.$inertia.post(route('Artifacts.update', this.artifact.id), this.form)
            console.log(this.form);
        },
         previewIcon(e) {
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
         },
         showIcon(){
                return "/storage/images/icon/artifact/";
         }
    },
}
</script>