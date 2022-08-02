<template>
    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight space-y-4">
                    Get Artifact API 
                </h2><br>
            </div>
            <div class="card bg-white rounded-md shadow-md dark:bg-dark-eval-1 p-5">
                <form @submit.prevent="submit">
                    <div class="flex space-x-4">
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">id</span>
                            </label>
                            <input v-model="form.id" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">Name</span>
                            </label>
                            <input v-model="form.name" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">icon</span>
                            </label>
                            <input v-model="form.icon" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100">
                        </div>
                    </div>
                    <button class="btn btn-success w-24">Submit</button>
                </form>
            </div>
        </template>
    </BreezeAuthenticatedLayout>
    <div>
        
    </div>
</template>
<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {Head,useForm, Link} from '@inertiajs/inertia-vue3'
export default {
        components: {
            BreezeAuthenticatedLayout,
            Head,
            Link,
        },
        props: {
            artifact: {
                type: Object,
                default(rawProps) {
                    return JSON.parse(localStorage.getItem('setArt')) || []
                }
            },
        },
        setup(props){
            const form = useForm({
                id: props.artifact.id,
                name: props.artifact.name,
                icon: props.artifact.icon,
                rarity: props.artifact.levelList,
                affixList: props.artifact.affixList,
            });
           
            return {form,};
        },
        methods: {
            submit() {
                this.form.post(route("Artifacts.store"));
            },
        },
       
}
</script>