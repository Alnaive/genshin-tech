<template>
    <div class=" transform hover:scale-105 duration-500 ease-in-out" v-for="character in characters" :key="character.id">
        <Link :href="route('showCharacter', { id: character.slug })"  @click="api(character)">
        <div v-if="character.element == 'Fire'" v-show="!PyroHidden" class="relative inline-block w-24 m-2 rounded-lg h-26 h-auto w-32 ">
            <div  class=" flex flex-row justify-center rounded-t-lg bg-gray-scale" >
                <span>
                    <img src="image/element/Element_Pyro.png" class="absolute w-8 top-1 left-1">

                    <img v-if="character.rarity == '5'" :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                    <img v-else :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                </span>
                <div class="absolute flex flex-row top-28" style="margin-top:5px">
                        <img v-if="character.rarity == '5'" src="image/rarity/Icon_5_Stars.png" class="w-24">
                        <img v-else src="image/rarity/Icon_4_Stars.png" style="width:78px;">
                </div>
            </div>
            <div class="flex items-center justify-center overflow-auto text-sm bg-gray-scale text-black text-center rounded-b-lg h-9 ">
                <p class="leading-none">{{character.name}}</p>
            </div>
        </div>
        <div v-else-if="character.element == 'Water'" v-show="!HydroHidden" class="relative inline-block w-24 m-2 rounded-lg h-26 h-auto w-32">
            <div  class=" flex flex-row justify-center rounded-t-lg bg-gray-scale" >
                <span>
                    <img src="image/element/Element_Hydro.png" class="absolute w-8 top-1 left-1">
                    <img v-if="character.rarity == '5'" :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                    <img v-else :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                </span>
                <div class="absolute flex flex-row top-28" style="margin-top:5px">
                        <img v-if="character.rarity == '5'" src="image/rarity/Icon_5_Stars.png" class="w-24">
                        <img v-else src="image/rarity/Icon_4_Stars.png" style="width:78px;">
                </div>
            </div>
            <div class="flex items-center justify-center overflow-auto text-sm bg-gray-scale text-black text-center rounded-b-lg h-9 ">
                <p class="leading-none">{{character.name}}</p>
            </div>
        </div>
        <div v-else-if="character.element == 'Wind'" v-show="!AnemoHidden" class="relative inline-block w-24 m-2 rounded-lg h-26 h-auto w-32">
            <div  class=" flex flex-row justify-center rounded-t-lg bg-gray-scale" >
                <span>
                    <img src="image/element/Element_Anemo.png" class="absolute w-8 top-1 left-1">
                    <img v-if="character.rarity == '5'" :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                    <img v-else :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                </span>
                <div class="absolute flex flex-row top-28" style="margin-top:5px">
                        <img v-if="character.rarity == '5'" src="image/rarity/Icon_5_Stars.png" class="w-24">
                        <img v-else src="image/rarity/Icon_4_Stars.png" style="width:78px;">
                </div>
            </div>
            <div class="flex items-center justify-center overflow-auto text-sm bg-gray-scale text-black text-center rounded-b-lg h-9 ">
                <p class="leading-none">{{character.name}}</p>
            </div>
        </div>
        <div v-else-if="character.element == 'Electric'" v-show="!ElectroHidden" class="relative inline-block w-24 m-2 rounded-lg h-26 h-auto w-32">
            <div  class=" flex flex-row justify-center rounded-t-lg bg-gray-scale" >
                <span>
                    <img src="image/element/Element_Electro.png" class="absolute w-8 top-1 left-1">
                    <img v-if="character.rarity == '5'" :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                    <img v-else :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                </span>
                <div class="absolute flex flex-row top-28" style="margin-top:5px">
                        <img v-if="character.rarity == '5'" src="image/rarity/Icon_5_Stars.png" class="w-24">
                        <img v-else src="image/rarity/Icon_4_Stars.png" style="width:78px;">
                </div>
            </div>
            <div class="flex items-center justify-center overflow-auto text-sm bg-gray-scale text-black text-center rounded-b-lg h-9 ">
                <p class="leading-none">{{character.name}}</p>
            </div>
        </div>
        <div v-else-if="character.element == 'Grass'" v-show="!DendroHidden" class="relative inline-block w-24 m-2 rounded-lg h-26 h-auto w-32">
            <div  class=" flex flex-row justify-center rounded-t-lg bg-gray-scale" >
                <span>
                    <img src="image/element/Element_Dendro.png" class="absolute w-8 top-1 left-1">
                    <img v-if="character.rarity == '5'" :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                    <img v-else :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                </span>
                <div class="absolute flex flex-row top-28" style="margin-top:5px">
                        <img v-if="character.rarity == '5'" src="image/rarity/Icon_5_Stars.png" class="w-24">
                        <img v-else src="image/rarity/Icon_4_Stars.png" style="width:78px;">
                </div>
            </div>
            <div class="flex items-center justify-center overflow-auto text-sm bg-gray-scale text-black text-center rounded-b-lg h-9 ">
                <p class="leading-none">{{character.name}}</p>
            </div>
        </div>
        <div v-else-if="character.element == 'Ice'" v-show="!CryoHidden" class="relative inline-block w-24 m-2 rounded-lg h-26 h-auto w-32">
            <div  class=" flex flex-row justify-center rounded-t-lg bg-gray-scale" >
                <span>
                    <img src="image/element/Element_Cryo.png" class="absolute w-8 top-1 left-1">
                    <img v-if="character.rarity == '5'" :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                    <img v-else :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                </span>
                <div class="absolute flex flex-row top-28" style="margin-top:5px">
                        <img v-if="character.rarity == '5'" src="image/rarity/Icon_5_Stars.png" class="w-24">
                        <img v-else src="image/rarity/Icon_4_Stars.png" style="width:78px;">
                </div>
            </div>
            <div class="flex items-center justify-center overflow-auto text-sm bg-gray-scale text-black text-center rounded-b-lg h-9 ">
                <p class="leading-none">{{character.name}}</p>
            </div>
        </div>
        <div v-else v-show="!GeoHidden" class="relative inline-block w-24 m-2 rounded-lg h-26 h-auto w-32">
            <div  class=" flex flex-row justify-center rounded-t-lg bg-gray-scale" >
                <span>
                    <img src="image/element/Element_Geo.png" class="absolute w-8 top-1 left-1">
                    <img v-if="character.rarity == '5'" :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                    <img v-else :src="avatarIcon() + character.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                </span>
                <div class="absolute flex flex-row top-28" style="margin-top:5px">
                        <img v-if="character.rarity == '5'" src="image/rarity/Icon_5_Stars.png" class="w-24">
                        <img v-else src="image/rarity/Icon_4_Stars.png" style="width:78px;">
                </div>
            </div>
            <div class="flex items-center justify-center overflow-auto text-sm bg-gray-scale text-black text-center rounded-b-lg h-9 ">
                <p class="leading-none">{{character.name}}</p>
            </div>
        </div>
        </Link>
    </div>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

export default {
    components:{
        Head,Link,
    },
    props:['characters','PyroHidden','HydroHidden','AnemoHidden','ElectroHidden','DendroHidden','CryoHidden','GeoHidden'],
    data(){
        return {
            name: '',
        }
    },
    methods:{
        avatarIcon(){
            return 'https://res.cloudinary.com/genshin/image/upload/sprites/';
        },
        bg5(){
            return "../image/rarity/Background_Item_5_Star.png"
        },
        bg4(){
            return "../image/rarity/Background_Item_4_Star.png"
        },
    },
}
</script>