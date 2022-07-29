<template>
    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between  space-y-4">
                <h2 class="text-xl font-semibold leading-tight" >
                    {{character.name}}
                </h2>
            </div>
            <div class="card bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-3 p-5">
                <div class="flex space-x-4">
                    <div v-if="!character.constellation"><button @click="addConstellation()" class="btn btn-primary">Add Constellation</button></div>
                    <div v-else>
                        <div >Constellation has added</div>
                    </div>
                    <div v-if="!character.talent"><button @click="addTalent()" class="btn btn-primary">Add Talent</button></div>
                    <div v-else>
                        <div >Talent has added</div>
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
            character: Object,
            conste: {
                type: Object,
                default(rawProps) {
                    return JSON.parse(localStorage.getItem('constellation')) || []
                }
            },
            talent: {
                type: Object,
                default(rawProps) {
                    return JSON.parse(localStorage.getItem('talent')) || []
                }
            },
        },
        setup(props){
            const formConstellation = useForm({
                character_id: props.character.id,
                c1_icon: props.conste.images.c1,
                c2_icon: props.conste.images.c2,
                c3_icon: props.conste.images.c3,
                c4_icon: props.conste.images.c4,
                c5_icon: props.conste.images.c5,
                c6_icon: props.conste.images.c6,
            });
            const formTalent = useForm({
                character_id: props.character.id,
                talent1_icon: props.talent.images.combat1,
                talent2_icon: props.talent.images.combat2,
                talent3_icon: props.talent.images.combat3,
            });
            
            return {formConstellation, formTalent, };
        },
        methods: {
            addConstellation(){
                this.formConstellation.post(route("Constellations.store"));
            },
            addTalent(){
                this.formTalent.post(route("Talents.store"));
            },
            
        },
}
</script>