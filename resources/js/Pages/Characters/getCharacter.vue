<template>
    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="avatar">
                    <div class="w-24 rounded-full">
                        <img @click="test(data)"  :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${character.icon}.png`">
                    </div>
                </div>
            </div><br>
            <div class="card bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                <form @submit.prevent="submit">
                        <div class="flex space-x-4 p-5">
                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class=" text-black dark:text-white">ID</span>
                                </label>
                                <input v-model="form.id" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                                <button class="btn btn-success w-24" @click="addJson()">Submit</button>
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
                                    <span class=" text-black dark:text-white">element</span>
                                </label>
                                <input v-model="form.element" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100">
                            </div>
                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class=" text-black dark:text-white">Icon</span>
                                </label>
                                <input v-model="form.icon" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
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
        </template>

    </BreezeAuthenticatedLayout>
    <div>
        
    </div>
</template>
<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {Head,useForm, Link} from '@inertiajs/inertia-vue3'
const GenshinDb = require('genshin-db');

export default {
        components: {
            BreezeAuthenticatedLayout,
            Head,
            Link,
        },
        props: {
            character: {
                type: Object,
                default(rawProps) {
                    return JSON.parse(localStorage.getItem('character')) || []
                }
            },
            itemName: Object,
            skillDepot: Object,
           
        },
        data(){
            return{
                url:null,
                op: null,
                characterID: null,
            }
        },
        setup(props, data){
            const form = useForm({
                id: null,
                name: props.character.name,
                rarity: props.character.rank,
                element: props.character.element,
                icon: props.character.icon,
                weaponType: props.character.weaponType,
                Consts: [],
                skillDepotId: null,
                SkillOrder: [],
                Skills: {},
                ProudMap: {},
                avatar: null,
            });
            return {form};
        },
        methods: {
            defineId(){
                const boyWind = this.character.id == '10000005-anemo';
                const boyGeo = this.character.id == '10000005-geo';
                const boyElectro = this.character.id == '10000005-electro';
                const boyDendro = this.character.id == '10000005-dendro';
                const girlWind = this.character.id == '10000007-anemo';
                const girlGeo = this.character.id == '10000007-geo';
                const girlElectro = this.character.id == '10000007-electro';
                const girlDendro = this.character.id == '10000007-dendro';

                if(boyWind){
                    return this.characterID = 10000005;
                } else if(boyGeo) {
                    return this.characterID = "10000005-506";
                } else if(boyElectro) {
                    return this.characterID = "10000005-507";
                } else if(boyDendro) {
                    return this.characterID = "10000005-508";
                } else if(girlWind) {
                    return this.characterID = "10000007-704";
                } else if(girlGeo) {
                    return this.characterID = "10000007-706";
                } else if(girlElectro) {
                    return this.characterID = "10000007-707";
                } else if(girlDendro) {
                    return this.characterID = "10000007-708";
                } else {
                    return this.characterID = this.character.id;
                }
            },
            defineCharacterId(){
                const ItemName = this.itemName;
                Object.keys(ItemName).map((key) => {
                    if(this.characterID == key){
                      this.form.id = key;
                      this.form.Consts = ItemName[key].Consts; 
                      this.form.SkillOrder = ItemName[key].SkillOrder; 
                      this.form.Skills = ItemName[key].Skills; 
                      this.form.ProudMap = ItemName[key].ProudMap; 
                    }
                })
            },
            defineSkillDepot(){
                Object.values(this.skillDepot).map((item) => {
                    if(this.form.SkillOrder[0] == item.skills[0]){
                        this.form.skillDepotId = item.id;
                    }
                })
            },
            submit() {
                if (this.$refs.Avatar) {
                    this.form.avatar = this.$refs.Avatar.files[0];
                }
                this.form.post(route("Characters.store"));
            },
            onFileChange(e) {
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
            },
        },
        mounted(){
            this.defineId();
            this.defineCharacterId();
            this.defineSkillDepot();
        }
}
</script>