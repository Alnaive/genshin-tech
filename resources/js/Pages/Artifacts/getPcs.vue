<template>
    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between  space-y-4">
                <h2 class="text-xl font-semibold leading-tight" >
                    {{artifact.name}}
                </h2>
            </div>
            <div class="card bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-3 p-5">
                 <div v-for="data in artifacts" :key="data.id">
                    <div v-if="artifact.id == data.setId">
                       <div v-for="item in artPcs" :key="item.id">
                            <div v-if="item.id != data.id">
                                ID: {{data.id}} || Rarity: {{data.rankLevel}} || Type: {{data.equipType}} 
                                <div v-for="(art, key) in itemName" :key="key">
                                    <div v-if="key == data.nameTextMapHash">
                                        {{art.EN}}
                                    </div>
                                </div>
                                <Link :href="route('storePcsApi')" >
                                <button class="btn btn-success" @click="Pcs(data)">add</button>
                                </Link>
                            </div>
                       </div>
                    </div>
                </div>
               
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
            artifact: Object,
            artifacts: Object,
            artPcs: Object,
            itemName: Object,
        },
        setup(props){
            const form = useForm({
                id: props.artifacts.id,
            })
            return{form}
        },
        methods: {
            Pcs(data){
                const i = data;
                              localStorage.setItem('pcs', JSON.stringify(i));

            }
        },
        computed: {
            loop(){
                const ItemName = this.itemName;
                const c = this.artifacts.nameTextMapHash;
                 Object.keys(ItemName).map((key) => {
                    if(c == key){
                      this.form.name = ItemName[key].EN; 
                    }
                })
            }
        }
        // setup(props){
        //     const formCirclet = useForm({
        //         artifact_id: props.artifact.id,
        //         name: props.pcs.circlet.name,
        //         description: props.pcs.circlet.description,
        //         relictype: props.pcs.circlet.relictype,
        //         rarity: props.pcs.rarity,
        //         icon: props.pcs.images.circlet,
        //     });
        //     const formFlower = useForm({
        //         artifact_id: props.artifact.id,
        //         name: props.pcs.flower.name,
        //         description: props.pcs.flower.description,
        //         relictype: props.pcs.flower.relictype,
        //         rarity: props.pcs.rarity,
        //         icon: props.pcs.images.flower,
        //     });
        //     const formGoblet = useForm({
        //         artifact_id: props.artifact.id,
        //         name: props.pcs.goblet.name,
        //         description: props.pcs.goblet.description,
        //         relictype: props.pcs.goblet.relictype,
        //         rarity: props.pcs.rarity,
        //         icon: props.pcs.images.goblet,
        //     });
        //     const formPlume = useForm({
        //         artifact_id: props.artifact.id,
        //         name: props.pcs.plume.name,
        //         description: props.pcs.plume.description,
        //         relictype: props.pcs.plume.relictype,
        //         rarity: props.pcs.rarity,
        //         icon: props.pcs.images.plume,
        //     });
        //     const formSands = useForm({
        //         artifact_id: props.artifact.id,
        //         name: props.pcs.sands.name,
        //         description: props.pcs.sands.description,
        //         relictype: props.pcs.sands.relictype,
        //         rarity: props.pcs.rarity,
        //         icon: props.pcs.images.sands,
        //     });
        //     return {formCirclet, formFlower, formGoblet, formPlume, formSands};
        // },
        // methods: {
        //     addCirclet(){
        //         this.formCirclet.post(route("storePcs"));
        //     },
        //     addFlower(){
        //         this.formFlower.post(route("storePcs"));
        //     },
        //     addGoblet(){
        //         this.formGoblet.post(route("storePcs"));
        //     },
        //     addPlume(){
        //         this.formPlume.post(route("storePcs"));
        //     },
        //     addSands(){
        //         this.formSands.post(route("storePcs"));
        //     },
        // },
}
</script>