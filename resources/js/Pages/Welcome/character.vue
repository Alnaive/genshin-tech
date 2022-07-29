<template>
    <Head>
        <title>Character</title>
    </Head>
        <Guest>
            <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    <input type="text" v-model="params.search" placeholder="Search" class="block ml-auto rounded-md mb-4 dark:bg-dark-eval-1">
                </h2>
            </div>
                <div class="btn-group">
                    <button v-on:click="PyroHidden = !PyroHidden" class="hover:bg-base-content dark:hover:bg-info-content" :class="PyroHidden ? 'btn bg-gray-scale opacity-50' : 'btn bg-accent-content dark:bg-base-100' " > <img src="image/element/Element_Pyro.png" class="w-7 h-7" /> </button>
                    <button v-on:click="HydroHidden = !HydroHidden" class="hover:bg-base-content dark:hover:bg-info-content" :class="HydroHidden ? 'btn bg-gray-scale opacity-50' : 'btn bg-accent-content dark:bg-base-100' " >  <img src="image/element/Element_Hydro.png" class="w-7 h-7" /> </button>
                    <button v-on:click="AnemoHidden = !AnemoHidden" class="hover:bg-base-content dark:hover:bg-info-content" :class="AnemoHidden ? 'btn bg-gray-scale opacity-50' : 'btn bg-accent-content dark:bg-base-100' " >  <img src="image/element/Element_Anemo.png" class="w-7 h-7" /> </button>
                    <button v-on:click="ElectroHidden = !ElectroHidden" class="hover:bg-base-content dark:hover:bg-info-content" :class="ElectroHidden ? 'btn bg-gray-scale opacity-50' : 'btn bg-accent-content dark:bg-base-100' " >  <img src="image/element/Element_Electro.png" class="w-7 h-7" /> </button>
                    <button v-on:click="DendroHidden = !DendroHidden" class="hover:bg-base-content dark:hover:bg-info-content" :class="DendroHidden ? 'btn bg-gray-scale opacity-50' : 'btn bg-accent-content dark:bg-base-100' " >  <img src="image/element/Element_Dendro.png" class="w-7 h-7" /> </button>
                    <button v-on:click="CryoHidden = !CryoHidden" class="hover:bg-base-content dark:hover:bg-info-content" :class="CryoHidden ? 'btn bg-gray-scale opacity-50' : 'btn bg-accent-content dark:bg-base-100' " >  <img src="image/element/Element_Cryo.png" class="w-7 h-7" /> </button>
                    <button v-on:click="GeoHidden = !GeoHidden" class="hover:bg-base-content dark:hover:bg-info-content" :class="GeoHidden ? 'btn bg-gray-scale opacity-50' : 'btn bg-accent-content dark:bg-base-100' " >  <img src="image/element/Element_Geo.png" class="w-7 h-7" /> </button>
                </div> 
            </template>
            <div  class="flex flex-wrap justify-center">
                <Element :characters="characters" 
                :char="char"
                :PyroHidden="PyroHidden" 
                :HydroHidden="HydroHidden"
                :AnemoHidden="AnemoHidden"
                :ElectroHidden="ElectroHidden"
                :DendroHidden="DendroHidden"
                :CryoHidden="CryoHidden"
                :GeoHidden="GeoHidden"
                />
            </div>
       
        </Guest>

    
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navbar from '@/Shared/Navbar';
import Guest from '@/Layouts/Guest.vue'
import { ref } from "vue";
import pickBy from 'lodash/pickBy'
import Element from './element.vue';

export default {
    components: {
      Head,
      Link,
      Navbar,
      Guest,
      Element,
     
    },
    props: {
        characters: Object,
    },
    data(){
        return{
                PyroHidden: false,
                HydroHidden: false,
                AnemoHidden: false,
                ElectroHidden: false,
                DendroHidden: false,
                CryoHidden: false,
                GeoHidden: false,
             params: {
                    search: null,
                },
                
        }
    },
     setup(props) {
        const active = ref(0);
       
        return { active, };
    },
    watch: {
            params: {
                handler() {
                    this.$inertia.get(this.route('character'), pickBy(this.params), {
                        replace: true,
                        preserveState: true
                    });
                },
                deep: true,
            },
        },
    methods:{
        showCharIcon() {
            return "/storage/images/icon/character/";
        },
         bg5(){
                return "../image/rarity/Background_Item_5_Star.png"
            },
            bg4(){
                return "../image/rarity/Background_Item_4_Star.png"
            },
        showElement(){
            const ele = this.characters.element;
            if(ele == "Cryo"){
                return "image/element/Element_Cryo.png"
            } else if(ele == "Geo"){
                return "image/element/Element_Geo.png"
            } else if(ele == "Dendro"){
                return "image/element/Element_Dendro.png"
            } else if(ele == "Anemo"){
                return "image/element/Element_Anemo.png"
            } else if(ele == "Electro"){
                return "image/element/Element_Electro.png"
            } else if(ele == "Hydro"){
                return "image/element/Element_Hydro.png"
            } else if(ele == "Pyro"){
                return "image/element/Element_Pyro.png"
            }
        },
    },
}


</script>
<style>
    .rounded-br-3xl{
        color: white;
    }
</style>