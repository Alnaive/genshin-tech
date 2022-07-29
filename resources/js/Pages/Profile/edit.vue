<template>
    <Head title="Account" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    <!-- Update User {{ user.name }}  <img
                                            :src="showImage() + user.image"
                                            class="h-10 w-10 rounded-full"
                                        /> -->
                </h2>

                
            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
             <br>
            <form @submit.prevent="update" class="w-full max-w-sm" >
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Full Name
                    </label>
                    </div>
                    <div class="md:w-2/3">
                    <input v-model="form.name" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" >
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-about">
                        Image
                    </label>
                    </div>
                    <div class="md:w-2/3">
                                                           <input v-model="form.image" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" >

                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                    <button class="shadow bg-green-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Update
                    </button>

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
    props: {
        user: Object,
    },
    // data(){
    //     return{
    //         form: this.$inertia.form({
    //         // _method: 'put',
    //         name: this.user.name,
    //         about: this.user.about,
    //         image: null,
    //          })
    //     }
    // },
     setup(props) {
        const form = useForm({
              _method: 'put',
            name: props.user.name,
            image: props.user.image,
        });

        return { form };
    },
    
    methods:{
        update(){
            // let data = new FormData();
            // data.append('name', this.form.name);
            // data.append('about', this.form.about);
            if (this.$refs.photo) {
                this.form.image = this.$refs.photo.files[0];
            }
            console.log(this.form);
            this.$inertia.post(route('profileUpdate', this.user.id), this.form)
                    // this.$inertia.put(this.route('profileUpdate', this.user.id))
        },
         previewImage(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
       
        //  showImage() {
        //     return "/storage/";
        // },
    },

}
</script>
