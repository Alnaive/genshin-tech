<template>
    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between  space-y-4">
                <h2 class="text-xl font-semibold leading-tight" >
                    {{pcs.nameTextMapHash}}
                </h2>
            </div>
            <div class="card bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-3 p-5">
               <form @submit.prevent="Pcs()">
               <label for="">Name</label><br>
                    <input v-model="form.name" type="text" placeholder="Name" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100" required>
                <div class="grid-col-4">
                    <ul>
                        <li>ID: {{pcs.id}}</li>
                        <li>SetId: {{pcs.setId}}</li>
                        <li>Rarity: {{pcs.rankLevel}}</li>
                        <li>Type: {{pcs.equipType}}</li>
                        <li> Icon: 
                            <div class="avatar">
                                <div class="w-12">
                                    <img :src="`https://enka.shinshin.moe/ui/${pcs.icon}.png`" alt="">
                                </div>
                            </div>
                        </li>
                    </ul>
                    <Button class="btn btn-success" type="submit">Submit</Button>
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
            pcs: {
                type: Object,
                default(rawProps) {
                    return JSON.parse(localStorage.getItem('pcs')) || []
                }
            },
            itemName: Object,
        },
        setup(props){
            const form = useForm({
                id: props.pcs.id,
                setId: props.pcs.setId,
                name: '',
                rankLevel: props.pcs.rankLevel,
                equipType: props.pcs.equipType,
                icon: props.pcs.icon,
            })
            return{form}
        },
        methods: {
            Pcs(){
                this.form.post(route("storePcs"));
            },
            
        },
        computed: {
            loop(){
                const ItemName = this.itemName;
                const c = this.pcs.nameTextMapHash;
                 Object.keys(ItemName).map((key) => {
                    if(c == key){
                      this.form.name = ItemName[key].EN; 
                    }
                })
            }
        }
     
}
</script>