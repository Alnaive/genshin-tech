<template>
    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight space-y-4">
                    Get  Pieces
                </h2><br>
            </div>
            <div class="card bg-white rounded-md shadow-md dark:bg-dark-eval-1 p-5">
                <form @submit.prevent="submit">
                     <h1>Flower Piece</h1>
                    <div class="flex space-x-4">
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">Name</span>
                            </label>
                            <input v-model="formFlower.name" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">Type</span>
                            </label>
                            <input v-model="formFlower.relictype" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">rarity</span>
                            </label>
                            <input v-model="formFlower.rarity" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100">
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label for=""><span>Description</span></label>
                            <textarea class="textarea textarea-bordered" v-model="formFlower.description"></textarea>
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
            pcs: {
                type: Object,
                default(rawProps) {
                    return JSON.parse(localStorage.getItem('artifact')) || []
                }
            },
            artifact: Object,
        },
        setup(props){
           
            const formFlower = useForm({
                artifact_id: props.artifact.id,
                name: props.pcs.flower.name,
                description: props.pcs.flower.description,
                relictype: props.pcs.flower.relictype,
                rarity: props.pcs.rarity,
                icon: props.pcs.images.flower,
            });
            return { formFlower };
        },
        methods: {
            submit() {
                this.formFlower.post(route("storePcs"));
            },
            
        },
}
</script>