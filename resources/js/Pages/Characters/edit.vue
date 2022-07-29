<template>
    <Head title="Account" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{character.name}}
                </h2>

                
            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white  rounded-md shadow-md dark:bg-dark-eval-1">
             <br>
            <form @submit.prevent="update" class="w-full max-w-sm" >
                <div class="flex gap-2">
                        <div class="form-control">
                            <label class="label">
                            <span class="label-text text-black dark:text-white">Name</span>
                            </label> 
                            <input type="text" v-model="form.name" placeholder="Char Name" class="input bg-white dark:text-black">
                            <br>
                        <button class="btn btn-success col-3">Update</button>
                        </div>
                        <div class="form-control">
                            <label class="label">
                            <span class="label-text text-black dark:text-white">rarity</span>
                            </label> 
                            <input type="text" v-model="form.rarity" placeholder="Char rarity" class="input bg-white dark:text-black">
                        </div>
                        <div class="form-control">
                            <label class="label">
                            <span class="label-text text-black dark:text-white">element</span>
                            </label> 
                            <input type="text" v-model="form.element" placeholder="Char element" class="input bg-white dark:text-black">
                        </div>
                        <div class="form-control">
                            <label class="label">
                            <span class="label-text text-black dark:text-white">weapontype</span>
                            </label> 
                            <input type="text" v-model="form.weapontype" placeholder="Char weapontype" class="input bg-white dark:text-black">
                        </div>
                        <div class="form-control">
                            <label class="label">
                            <span class="label-text text-black dark:text-white">icon</span>
                            </label> 
                            <input type="text" v-model="form.icon" placeholder="Char icon" class="input bg-white dark:text-black">
                        </div>
                        <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class=" text-black dark:text-white">Avatar</span>
                                </label>
                                <input type="file" @change="onFileChange" ref="Avatar"/>
                                <div id="preview">
                                    <img v-if="url" :src="url" />
                                </div>
                            </div>
                </div>
            </form>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, useForm } from '@inertiajs/inertia-vue3'
import FileInput from '@/Shared/FileInput'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        FileInput,
    },
    setup(props) {
        const form = useForm({
              _method: 'put',
            name: props.character.name,
            rarity: props.character.rarity,
            element: props.character.element,
            weapontype: props.character.weapontype,
            icon: props.character.icon,
            avatar: props.character.avatar,
            status: props.character.status,
        });

        return { form };
    },
    props: {
        character: Object,
    },
    data(){
            return{
                url:null,
            }
        },
    methods:{
        update(){
                if (this.$refs.Avatar) {
                    this.form.avatar = this.$refs.Avatar.files[0];
                }
                 
            this.$inertia.post(route('updateCharacter', this.character.id), this.form)

            // this.$inertia.put(route('charUpdate', this.character.id), this.form)
        },
       
        showAvatar() {
            return "/storage/images/icon/avatar/";
        },

        onFileChange(e) {
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
            },
    },

}
</script>
