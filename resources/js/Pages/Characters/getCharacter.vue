<template>
    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="avatar">
                    <div class="w-24 rounded-full">
                        <img @click="test(data)"  :src="`https://enka.shinshin.moe/ui/${character.SideIconName}.png`">
                        {{loop()}}
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
                                <input v-model="form.Rarity" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100">
                            </div>
                             <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class=" text-black dark:text-white">element</span>
                                </label>
                                <input v-model="form.Element" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100">
                            </div>
                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class=" text-black dark:text-white">CDN Icon</span>
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
            charKey: {
                type: Object,
                default(rawProps) {
                    return JSON.parse(localStorage.getItem('charKey')) || []
                }
            },
            itemName: Object,
           
        },
        data(){
            return{
                url:null,
                op: null,
            }
        },
        setup(props, data){
            const form = useForm({
                id: props.charKey,
                name: null,
                Rarity: props.character.QualityType,
                Element: props.character.Element,
                SideIconName: props.character.SideIconName,
                Consts: props.character.Consts,
                SkillOrder: props.character.SkillOrder,
                Skills: props.character.Skills,
                ProudMap: props.character.ProudMap,
                icon: null,
                avatar: null,
            });
            return {form};
        },
        computed: {
            
        },
        methods: {
            loop(){
                const ItemName = this.itemName;
                const c = this.character.NameTextMapHash;
                Object.keys(ItemName).map((key) => {
                    if(c == key){
                     return this.form.name = ItemName[key].EN; 
                    }
                });
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
            addJson(){
                const i = this.form.name;
                const talent = GenshinDb.talents(i);
                const conste = GenshinDb.constellations(i);
                localStorage.setItem('talent', JSON.stringify(talent));
                localStorage.setItem('constellation', JSON.stringify(conste));
            },
        },
}
</script>