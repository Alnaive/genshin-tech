<template>
    <head>
        <title>{{title}}</title>
    </head>
    <Guest v-if="agent">
        
    </Guest>
    <Guest v-else>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2  class="text-xl font-semibold leading-tight">
                    {{title}} 
                </h2>
            </div>
        </template>
        <div class="flex flex-wrap">
        <tabs v-model="active">
            <tab>Statistic</tab>
        </tabs>
        </div>
         <tab-panels v-model="active">
            <tab-panel >
                <div class="grid overflow-hidden xl:grid-cols-2 xl:grid-rows-2 xl:gap-4 lg:grid-cols-2 lg:grid-rows-2 lg:gap-4 gap-4 grid-flow-row">
                    <div class="card image-full bg-white dark:bg-dark-eval-1">
                        <div class="justify-end card-body">
                            <h2 class="card-title">{{character.name}}</h2>
                            <p class="text-black dark:text-white">Currently No Data For {{character.name}}</p>
                            <div class="card-actions flex justify-between">
                            <Link :href="route('addBuild', { id: character.slug })"
                                class="btn btn-success gap-1"> <vue-feather type="plus-square"></vue-feather> Build
                            </Link>
                                <input type="checkbox" id="my-modal-2" class="modal-toggle "> 
                            </div>
                        </div>
                    </div>
                </div>
            </tab-panel>
            <!-- <tab-panel>
                  <form @submit.prevent="searchUID()">
                      <div class="form-control">
                      <label for="">UID</label>
                      <input type="text" v-model="form.uid" class="input">
                      <button class="btn btn-secondary" type="submit">Search</button>
                  </div>
                  </form>
            </tab-panel> -->
           
            </tab-panels>
    </Guest>
</template>

<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Guest from '@/Layouts/Guest.vue'
import Tabs from '@/Shared/Tabs';
import Tab from '@/Shared/Tab';
import TabPanels from '@/Shared/TabPanels';
import TabPanel from '@/Shared/TabPanel';
import { ref } from "vue";
    import VueFeather from 'vue-feather';

export default {
    components:{
        Head, Link,
        Guest,
        Tab, Tabs, TabPanel, TabPanels,
        VueFeather,
       
    },
    props: {
        title: String,
        character: Object,
        char: {
                type: Object,
                default(rawProps) {
                    return JSON.parse(localStorage.getItem('character')) || []
                }
            },
    },
    setup(props) {
        const active = ref(0);
        const activetab1 = ref(0);
        const form = useForm({
            uid: null,
        })
        return { active, activetab1, form };
    },
    methods:{

        // searchUID(){
        //     const UID = this.form.uid;
        //     const url = `https://enka.shinshin.moe/u/${UID}/__data.json`
        //     localStorage.setItem('uid', JSON.stringify(url));

        //     console.log(url)
        // },
 
         AvatarSplash(){
            const src = this.char.images.namegachasplash;
            const url = "https://res.cloudinary.com/genshin/image/upload/sprites/"+src+".png"
            return url;
        },
         showCharIcon() {
            return "/storage/images/icon/character/";
        },
         showAvatar() {
            return "/storage/images/icon/avatar/";
        },
        bgImage(){
            return "/storage/images/icon/avatar/";
        },
        showElement(){
            const ele = this.character.element;
            if(ele == "Cryo"){
                return "../image/element/Element_Cryo.png"
            } else if(ele == "Geo"){
                return "../image/element/Element_Geo.png"
            } else if(ele == "Dendro"){
                return "../image/element/Element_Dendro.png"
            } else if(ele == "Anemo"){
                return "../image/element/Element_Anemo.png"
            } else if(ele == "Electro"){
                return "../image/element/Element_Electro.png"
            } else if(ele == "Hydro"){
                return "../image/element/Element_Hydro.png"
            } else if(ele == "Pyro"){
                return "../image/element/Element_Pyro.png"
            }
        },
    },
    
}
</script>

<style>
    .card.image-full:before{
        background-color: transparent;
    }
</style>
