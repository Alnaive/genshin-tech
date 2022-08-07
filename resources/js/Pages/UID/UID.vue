<template>
    <Head>
        <title>Character</title>
    </Head>
        <Guest>
            <template #header>
                <div class="card glass  card-side flex items-center space-x-4 p-2">
                    <figure class="">
                    <div class="avatar" >
                        <div class="w-24">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${avatarProfile}`">
                        </div>
                    </div>
                    </figure>
                    <div class="flex flex-col">
                        <div class="box row-span-1 col-span-2" >
                                    <h1 class="text-lg font-bold">{{uid.playerInfo.nickname}}</h1>
                        </div>
                        <div class="flex">
                            <div class="">
                                <pre>AR {{uid.playerInfo.level}} ^ WL {{uid.playerInfo.worldLevel}}</pre>
                                <pre>{{uid.playerInfo.signature}}</pre>
                            </div>
                            <div class="box">
                            </div>
                        </div>
                    </div>
                </div>
                <div  v-if="!uid.avatarInfoList" class="alert alert-info shadow-lg" >
                    <div>no data found, please add character in-game profile</div>
                </div>
            </template>
            
            <div class="flex overflow-auto lg:overflow-hidden">
                <tabs v-model="active">
                    <tab  v-for="index in uid.avatarInfoList" :key="index" >
                        <div v-for="data in character" :key="data" >
                            <div class="avatar" v-if="data.id == index.avatarId">
                                <div class="w-16 rounded-full">
                                    <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${data.icon}`" alt="">
                                </div>
                            </div>
                        </div>
                    </tab>
                </tabs>
            </div>
            <tab-panels v-model="active" >
                <tab-panel v-for="data in uid.avatarInfoList" :key="data" >
        <div class="flex justify-center space-x-2 " v-for="char in character" :key="char.id" >
            <div v-if="data.avatarId == char.id" class="artboard phone-2 artboard-demo  card shadow-xl image-full bg-dark-eval-2 
             transform hover:scale-105 duration-500 ease-in-out" >
             <Link :href="route('AddBuild', { id: UID })" @click="addBuild(data)" v-on:click="addCharacter(char)">
            <figure >
                    <img :src="showAvatar() + char.avatar" >
                </figure> 
                <div class="">
                    <h3 class="text-center text-black dark:text-white font-bold text-lg absolute left-[11px] top-0 mt-5">{{char.name}}  Lv {{data.propMap[4001]['val']}}
                    </h3>
                    <!-- <Equip :uid="uid" ></Equip> -->
                    <div v-for="(weaponItem, index) in Object.keys(data.equipList).splice(5,5)" :key="index" class="avatar absolute left-2 top-20 ">
                        <div v-if="data.equipList[weaponItem].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" >
                            <img v-if="Object.values(data.equipList[weaponItem].weapon.promoteLevel > 1)"  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[weaponItem].flat.icon}_Awaken.png`">
                            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[weaponItem].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[weaponItem].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" >
                            <img v-if="Object.values(data.equipList[weaponItem].weapon.promoteLevel > 1)"  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[weaponItem].flat.icon}_Awaken.png`">
                            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[weaponItem].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[weaponItem].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }" >
                            <img v-if="Object.values(data.equipList[weaponItem].weapon.promoteLevel > 1)"  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[weaponItem].flat.icon}_Awaken.png`">
                            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[weaponItem].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[weaponItem].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }" >
                            <img v-if="Object.values(data.equipList[weaponItem].weapon.promoteLevel > 1)"  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[weaponItem].flat.icon}_Awaken.png`">
                            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[weaponItem].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[weaponItem].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }" >
                            <img v-if="Object.values(data.equipList[weaponItem].weapon.promoteLevel > 1)"  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[weaponItem].flat.icon}_Awaken.png`">
                            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[weaponItem].flat.icon}.png`">
                        </div>
                    </div>
                    <div v-for="(flower, index) in Object.keys(data.equipList).splice(0,1)" :key="index" class="avatar absolute left-2 top-36">
                        <div v-if="data.equipList[flower].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" 
                        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[flower].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[flower].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" 
                        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[flower].flat.icon}.png`">
                        </div>
                         <div v-else-if="data.equipList[flower].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" 
                        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[flower].flat.icon}.png`">
                        </div>
                         <div v-else-if="data.equipList[flower].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" 
                        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[flower].flat.icon}.png`">
                        </div>
                         <div v-else-if="data.equipList[flower].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" 
                        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[flower].flat.icon}.png`">
                        </div>
                    </div>
                    <div v-for="(plume, index) in Object.keys(data.equipList).splice(1,1)" :key="index" class="avatar absolute left-2 top-52">
                        <div v-if="data.equipList[plume].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" 
                        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[plume].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[plume].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" 
                        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[plume].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[plume].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" 
                        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[plume].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[plume].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" 
                        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[plume].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[plume].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" 
                        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[plume].flat.icon}.png`">
                        </div>
                    </div>
                    <div v-for="(sand, index) in Object.keys(data.equipList).splice(1,2)" :key="index" class="avatar absolute left-16 top-28 ">
                        <div v-if="data.equipList[sand].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[sand].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[sand].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[sand].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[sand].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[sand].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[sand].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[sand].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[sand].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[sand].flat.icon}.png`">
                        </div>
                    </div>
                    <div v-for="(goblet, index) in Object.keys(data.equipList).splice(2,2)" :key="index" class="avatar absolute left-16 top-44 ">
                        <div v-if="data.equipList[goblet].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[goblet].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[goblet].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[goblet].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[goblet].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[goblet].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[goblet].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[goblet].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[goblet].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[goblet].flat.icon}.png`">
                        </div>
                    </div>
                    <div v-for="(circlet, index) in Object.keys(data.equipList).splice(2,3)" :key="index" class="avatar absolute left-16 top-60 indicator">
                        <div v-if="data.equipList[circlet].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[circlet].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[circlet].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[circlet].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[circlet].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[circlet].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[circlet].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[circlet].flat.icon}.png`">
                        </div>
                        <div v-else-if="data.equipList[circlet].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${data.equipList[circlet].flat.icon}.png`">
                        </div>
                    </div>
                    <!-- end of equip -->
                </div>
                <div class="card absolute inset-x-0 bottom-0 mt-5">
                    <div class="bg-transparent" >
                        <section class="px-2 py-2 text-white" >
                            <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Health.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Max Hp</strong>
                                    <strong class="mr-2 "> <span >{{ data.fightPropMap[2000].toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
                                    </strong>
                                </div> 
                                <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Attack.png"  class="w-8 h-8">
                                    <strong class="flex-1 w-64">Attack</strong>
                                    <strong class="mr-2 "> <span >{{ data.fightPropMap[2001].toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Defense.png"  class="w-8 h-8">
                                    <strong class="flex-1 w-64">Defense</strong>
                                    <strong class="mr-2 "> <span >{{ data.fightPropMap[2002].toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Elemental Mastery</strong>
                                    <strong class="mr-2 "> <span >{{ data.fightPropMap[28].toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
                                    </strong>
                                </div>
                                <div class="divider"></div>
                                <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Critical_Hit.png" class="w-[23px] h-[21px] ml-[8px]">
                                    <strong class="flex-1 w-64 ">Critical Rate</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[20] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                    <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Critical_Damage.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Critical Damage</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[22] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Energy_Recharge.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Energy Recharge</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[23] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="char.Element == 'Water' && data.fightPropMap[42] > 0">
                                    <img src="/image/attribute/Hydro.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Hydro DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[42] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="char.Element == 'Wind' && data.fightPropMap[44] > 0">
                                    <img src="/image/attribute/Anemo.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Anemo DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[44] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div> 
                                <div class="flex items-center gap-2" v-if="char.Element == 'Fire' && data.fightPropMap[40] > 0">
                                    <img src="/image/attribute/Pyro.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Pyro DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[40] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="char.Element == 'Ice' && data.fightPropMap[46] > 0">
                                    <img src="/image/attribute/Cryo.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Cryo DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[46] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="char.Element == 'Electric' && data.fightPropMap[41] > 0">
                                    <img src="/image/attribute/Electro.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Electro DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[41] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="char.Element == 'Rock' && data.fightPropMap[45] > 0">
                                    <img src="/image/attribute/Geo.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Geo DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[45] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="data.fightPropMap[30] > 0">
                                    <img src="/image/attribute/Icon_Attribute_Physical2.png"  class="w-8 h-8">
                                    <strong class="flex-1 w-64">Physical DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[30] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                        </section>
                    </div>
                </div>
            </Link>
        </div>
        </div>
        </tab-panel>
            </tab-panels>
        </Guest>
</template>

<script>
import { Head, Link, useForm, useRemember } from '@inertiajs/inertia-vue3';
import Guest from '@/Layouts/Guest.vue'
import VueFeather from 'vue-feather';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import Tabs from '@/Shared/Tabs';
import Tab from '@/Shared/Tab';
import TabPanels from '@/Shared/TabPanels';
import TabPanel from '@/Shared/TabPanel';
import { ref } from "vue";
import Equip from './Component/Equip.vue';
import Stats from './Component/Stats.vue';
import { EncryptStorage } from 'encrypt-storage';

export default {
    components: {
      Head,
      Link,
      Guest, VueFeather, vSelect, Tab, Tabs, TabPanel, TabPanels,
       Equip, Stats,

     
    },
    props: {
        uid: Object,
        UID: String,
        character: Object,
        itemName: Object,
    },
    setup(props){
        const i = useForm({
            hp: null,
            atk: null,
        });
        const active = ref(0);

        return{i, active}
    },
    data(){
        return {
            avatarProfile: null,
        }
    },
    methods: {
        addBuild(data){
            const i = data;
            const encryptStorage = new EncryptStorage(process.env.MIX_SECRET_KEY, {
                 storageType: 'sessionStorage',
            });
            const encryptStorage1 = new EncryptStorage(process.env.MIX_SECRET_KEY, {
                 storageType: 'sessionStorage',
            });
            encryptStorage.setItem('sessionData', JSON.stringify(i));
            encryptStorage1.setItem('playerInfo', JSON.stringify(this.uid.playerInfo));
        },
        addCharacter(char){
             const encryptStorage = new EncryptStorage(process.env.MIX_SECRET_KEY, {
                 storageType: 'sessionStorage',
            });
            encryptStorage.setItem('charData', JSON.stringify(char));
        },
        showAvatar() {
            return "/storage/images/icon/avatar/";
        },
            bg5(){
                return "../../image/rarity/Background_Item_5_Star.png"
            },
            bg4(){
                return "../../image/rarity/Background_Item_4_Star.png"
            },
             bg3(){
                return "../../image/rarity/Background_Item_3_Star.png"
            },
            bg2(){
                return "../../image/rarity/Background_Item_2_Star.png"
            },
            bg1(){
                return "../../image/rarity/Background_Item_1_Star.png"
            },
        profileAvatar(){
            const x = this.uid.playerInfo.profilePicture.avatarId;
            this.character.map((item) => {
                if(item.id == x){
                 this.avatarProfile = item.icon;
                }
            })
        }
    },
    mounted(){
        this.profileAvatar();
    }
   
}

</script>
<style>
    .rounded-br-3xl{
        color: white;
    }
</style>