<template>
    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight space-y-4">
                    Get {{artifact.name}} Pieces
                </h2><br>
            </div>
            <div class="card bg-white rounded-md shadow-md dark:bg-dark-eval-1 p-5">
                <form @submit.prevent="submit">
                    <h1>Circlet Piece</h1>
                    <div class="flex space-x-4">
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">Name</span>
                            </label>
                            <input v-model="formCirclet.name" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">Type</span>
                            </label>
                            <input v-model="formCirclet.relictype" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">rarity</span>
                            </label>
                            <input v-model="formCirclet.rarity" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100">
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label for=""><span>Description</span></label>
                            <textarea class="textarea textarea-bordered" v-model="formCirclet.description"></textarea>
                        </div>
                    </div>
                     <!-- <h1>Flower Piece</h1>
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
                     <h1>Goblet Piece</h1>
                    <div class="flex space-x-4">
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">Name</span>
                            </label>
                            <input v-model="formGoblet.name" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">Type</span>
                            </label>
                            <input v-model="formGoblet.relictype" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">rarity</span>
                            </label>
                            <input v-model="formGoblet.rarity" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100">
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label for=""><span>Description</span></label>
                            <textarea class="textarea textarea-bordered" v-model="formGoblet.description"></textarea>
                        </div>
                    </div>
                     <h1>Plume Piece</h1>
                    <div class="flex space-x-4">
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">Name</span>
                            </label>
                            <input v-model="formPlume.name" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">Type</span>
                            </label>
                            <input v-model="formPlume.relictype" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">rarity</span>
                            </label>
                            <input v-model="formPlume.rarity" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100">
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label for=""><span>Description</span></label>
                            <textarea class="textarea textarea-bordered" v-model="formPlume.description"></textarea>
                        </div>
                    </div>
                     <h1>Sands Piece</h1>
                    <div class="flex space-x-4">
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">Name</span>
                            </label>
                            <input v-model="formSands.name" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">Type</span>
                            </label>
                            <input v-model="formSands.relictype" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class=" text-black dark:text-white">rarity</span>
                            </label>
                            <input v-model="formSands.rarity" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100">
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label for=""><span>Description</span></label>
                            <textarea class="textarea textarea-bordered" v-model="formSands.description"></textarea>
                        </div>
                    </div> -->
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
        data(){
            return{
                url:null,
            }
        },
        setup(props){
            const formCirclet = useForm({
                artifact_id: props.artifact.id,
                name: props.pcs.circlet.name,
                description: props.pcs.circlet.description,
                relictype: props.pcs.circlet.relictype,
                rarity: props.pcs.rarity,
                icon: props.pcs.images.circlet,
            });
            const formFlower = useForm({
                name: props.pcs.flower.name,
                description: props.pcs.flower.description,
                relictype: props.pcs.flower.relictype,
                rarity: props.pcs.rarity,
                icon: props.pcs.images.flower,
            });
            const formGoblet = useForm({
                name: props.pcs.goblet.name,
                description: props.pcs.goblet.description,
                relictype: props.pcs.goblet.relictype,
                rarity: props.pcs.rarity,
                icon: props.pcs.images.goblet,
            });
            const formPlume = useForm({
                name: props.pcs.plume.name,
                description: props.pcs.plume.description,
                relictype: props.pcs.plume.relictype,
                rarity: props.pcs.rarity,
                icon: props.pcs.images.plume,
            });
            const formSands = useForm({
                name: props.pcs.sands.name,
                description: props.pcs.sands.description,
                relictype: props.pcs.sands.relictype,
                rarity: props.pcs.rarity,
                icon: props.pcs.images.sands,
            });
            return {formCirclet, formFlower, formGoblet, formPlume, formSands};
        },
        methods: {
            submit() {
                this.formCirclet.post(route("storePcs"));
            },
            
        },
}
</script>