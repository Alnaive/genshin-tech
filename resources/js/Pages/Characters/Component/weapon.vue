<template>
    <div class=" transform hover:scale-105 duration-500 ease-in-out" v-for="data in weaponRecom" :key="data.id">
        <div class="relative inline-block w-24 m-2 rounded-lg h-26 h-auto w-32 ">
            <div  class=" flex flex-row justify-center rounded-t-lg bg-gray-scale" >
                <span>
                    <img v-if="data.weapon.rarity == '5'" :src="data.weapon.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                    <img v-else-if="data.weapon.rarity == '4'" :src="data.weapon.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                    <img v-else-if="data.weapon.rarity == '3'" :src="data.weapon.icon" class="h-24 h-32 rounded-br-3xl"
                    :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                </span>
                <div class="absolute flex flex-row top-28" style="margin-top:5px">
                        <img v-if="data.weapon.rarity == '5'" src="/image/rarity/Icon_5_Stars.png" class="w-24">
                        <img v-else-if="data.weapon.rarity == '4'" src="/image/rarity/Icon_4_Stars.png" style="width:78px;">
                        <img v-else-if="data.weapon.rarity == '3'" src="/image/rarity/Icon_3_Stars.png" style="width:78px;">
                </div>
            </div>
            <div class="flex items-center justify-center overflow-auto text-sm bg-gray-scale text-black text-center rounded-b-lg h-9 ">
                <p class="leading-none">{{data.weapon.name}}</p>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'
    import VueFeather from 'vue-feather';


export default {
    components:{
        Link,
        VueFeather,
    },
    props: ['weaponRecom'],
    methods:{
       showWeapon() {
            return "/storage/images/icon/weapon/";
        },
        bg5(){
                return "../image/rarity/Background_Item_5_Star.png"
            },
            bg4(){
                return "../image/rarity/Background_Item_4_Star.png"
            },
            bg3(){
                return "../image/rarity/Background_Item_3_Star.png"
            },
            bg2(){
                return "../image/rarity/Background_Item_2_Star.png"
            },
            bg1(){
                return "../image/rarity/Background_Item_1_Star.png"
            },
    }
}
</script>

