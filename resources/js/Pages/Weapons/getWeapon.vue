<template>
    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="avatar" >
                    <div class="w-24 rounded">
                        <img  :src="`https://enka.shinshin.moe/ui/${weapon.icon}.png`" alt="">
                        {{loop}}
                    </div>
                </div>
            </div>
            <div class="card bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                <form @submit.prevent="submit">
                        <div class="flex space-x-4 p-5">
                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class=" text-black dark:text-white">ID</span>
                                </label>
                                <input v-model="form.id" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                                <button class="btn btn-success w-24">Submit</button>
                            </div>
                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class=" text-black dark:text-white">Name</span>
                                </label>
                                <input v-model="form.name" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                            </div>
                             <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class=" text-black dark:text-white">rarity</span>
                                </label>
                                <input v-model="form.rarity" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100">
                            </div>
                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class=" text-black dark:text-white">Type</span>
                                </label>
                                <input v-model="form.weaponType" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100">
                            </div>
                        </div>
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
            weapon: {
                type: Object,
                default(rawProps) {
                    return JSON.parse(localStorage.getItem('weapon')) || []
                }
            },
            itemName: Object,
        },
        data(){
            return{
                url:null,
            }
        },
        setup(props){
            const form = useForm({
                id:props.weapon.id,
                name: '',
                icon: props.weapon.icon,
                rarity: props.weapon.rankLevel,
                weaponType: props.weapon.weaponType,
            });
            return {form};
        },
        methods: {
            submit() {
                this.form.post(route("Weapons.store"));
            },  
        },
        computed: {
            loop(){
                const ItemName = this.itemName;
                const c = this.weapon.nameTextMapHash;
                 Object.keys(ItemName).map((key) => {
                    if(c == key){
                      this.form.name = ItemName[key].EN; 
                    }
                })
            }
        }
}
</script>