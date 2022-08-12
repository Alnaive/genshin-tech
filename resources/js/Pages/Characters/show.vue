<template>
    <Head>
        <title>{{title}}</title>
    </Head>
    <Guest>
        <div class="flex justify-between container mx-auto space-x-4 mt-5">
            <div>
                <h2  class="text-xl font-semibold leading-tight mt-2">{{character.name}}</h2>
            </div>
            <form @submit.prevent="searchUID(uid)">
                <div class="flex flex-row space-x-4">
                    <Link :href="route('seeBuild', { id: character.slug })" class="btn btn-info"><VueFeather type="eye" size="24"></VueFeather></Link>
                    <input v-model="uid" type="text" placeholder="UID" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                    <button class="btn btn-primary"><VueFeather type="plus" size="24"></VueFeather></button>
                </div>
            </form>
        </div>
        <div class="flex flex-col md:flex-row mt-5 container mx-auto gap-5">
            <div  class="flex flex-row card shadow-lg overflow-x-auto" >
                    <ul id="landscapeData" class="flex flex-row space-x-4 rounded-xl" :style="{ backgroundImage: 'url(' + bgElement() + ')', backgroundSize:'cover', backgroundRepeat: 'no-repeat'}">
                        <li>
                                <div id="potraitData" class="w-[414px] h-[736px] card " >
                                    <figure>
                                        <img :src="showAvatar() + build[0].character.avatar" >
                                    </figure> 
                                    <div class="drop-shadow-lg shadow-black font-bold text-white absolute ml-4 top-0 mt-1">
                                    <pre data-prefix="$"><code>{{ build[0].character.name}}</code></pre> 
                                    <pre data-prefix=">" class="text-warning"><code>Level {{ build[0].level}}/{{( build[0].ascendsion * 10) + ( build[0].ascendsion>0?10:0) + 20}}</code></pre> 
                                    </div>
                                    <section class="visible md:invisible">
                                    <Equip :build="build" />
                                    </section>
                                    <Conste :build="build" />
                                    <Talent :build="build" /> 
                                    <div class="card absolute inset-x-0 bottom-0 mt-5">
                                        <div class="bg-transparent" >
                                            <section class="px-2 py-2 text-white" >
                                                <Stats :build="build" />
                                            </section>
                                        </div>
                                    </div>
                                </div>
                        </li>
                        <li>
                    <div class="space-y-1 mt-3 mr-2 text-white">
                        <Weapon :build="build" />
                        <Flower :build="build"/>
                        <Plume :build="build"/>
                        <Sands :build="build"/>
                        <Goblet :build="build"/>
                        <Circlet :build="build"/>
                        <div  class="flex space-x-4 ml-[120px]" >
                            <div class="flex-none ...">
                            <div class="flex flex-col">
                                    <div  v-if="build[0].two_pcs_art">
                                        <div v-for="data in build[0].two_pcs_art" :key="data" class="font-bold text-md">
                                        {{data}}
                                        </div>
                                    </div>
                                    <div v-if="build[0].one_pcs_art">
                                        <div class="font-bold text-md mt-[12px]">{{build[0].one_pcs_art}}</div>
                                    </div>
                                    <div v-if="build[0].four_pcs_art">
                                        <div class="font-bold text-md mt-[12px]">{{build[0].four_pcs_art}}</div>
                                    </div>
                            </div>
                            </div>
                            <div class="flex-none ...">
                                <div class="flex flex-col " >
                                    <div  v-if="build[0].two_pcs_art">
                                    <div v-for="data in build[0].two_pcs_art" :key="data" class="font-bold text-md">
                                        <div class="font-bold text-md badge">2</div>
                                        </div>
                                    </div>
                                    <div v-if="build[0].one_pcs_art">
                                        <div class="font-bold text-md badge mt-[12px]">3</div>
                                    </div>
                                    <div v-if="build[0].four_pcs_art">
                                        <div class="font-bold text-md badge mt-[12px]">4</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </li>
                    </ul>
            </div>
        </div>
        <div class="flex flex-col md:flex-row mt-5 container mx-auto gap-5">
            <div class="card">
                <WeaponCharts class="overflow-auto" :weaponName="weaponName" :totalWeapon="totalWeapon" :title="title"/>
            </div>
            <div class="card px-4">
                <h1> Weapon Recommendation</h1>
                <div class="flex">
                    <weaponRecom :weaponRecom="weaponRecom"/>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row mt-5 container mx-auto gap-5">
            <div class="card">
                 <div class="flex flex-wrap ml-5">
                    <tabs v-model="activeTabArt">
                    <tab>4 Set</tab>
                    <tab>2 Set</tab>
                </tabs>
                </div>
                <tab-panels v-model="activeTabArt">
                    <tab-panel><FourPcs class="overflow-auto" :art4Name="art4Name" :totalArt4="totalArt4" :title="title"/></tab-panel>
                    <tab-panel><TwoPcs class="oveflow-auto" :art2Name="art2Name" :totalArt2="totalArt2" :title="title"/></tab-panel>
                </tab-panels>
                
            </div>
            <div class="card px-4">
                <h1> Artifact Recommendation</h1>
                <div class="flex flex-wrap">
                    <tabs v-model="activeTabPcs">
                        <tab>4PCS</tab>
                        <tab>2PCS</tab>
                    </tabs>
                </div>
                <tab-panels v-model="activeTabPcs">
                    <tab-panel>
                        <div class="flex flex-wrap justify-center">
                            <artifact :art4Recom="art4Recom"/>
                        </div>
                    </tab-panel>
                    <tab-panel>
                        <div class="flex flex-wrap justify-center">
                        <artifact :art2Recom="art2Recom" />
                    </div> 
                    </tab-panel>
                </tab-panels>
            </div>
        </div>
        <div class="flex flex-col md:flex-row container mx-auto">
            <div class="card">
                <TalentChart :normalAttack="normalAttack" :elementalSkill="elementalSkill" :elementalBurst="elementalBurst" :title="title"/>
            </div>
            
        </div>
    </Guest>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Guest from '@/Layouts/Guest.vue'
import Tabs from '@/Shared/Tabs';
import Tab from '@/Shared/Tab';
import TabPanels from '@/Shared/TabPanels';
import TabPanel from '@/Shared/TabPanel';
import Charts from '@/Shared/Charts';
import { ref } from "vue";
import VueApexCharts from 'vue3-apexcharts'
import avatar from './Component/avatar.vue'
import weaponRecom from './Component/weaponRecom.vue'
import artifact from './Component/artifact.vue'
import CharLv from './Component/charts/char_lv'
import Party from './Component/charts/Party'
import WeaponCharts from './Component/charts/weapon'
import FourPcs from './Component/charts/four_pcs_art.vue'
import TwoPcs from './Component/charts/two_pcs_art.vue'
import TalentChart from './Component/charts/talent.vue'
 import Pagination from '@/Components/Pagination'
import Equip from '@/Shared/component/Equip.vue';
import Conste from '@/Shared/component/Conste.vue';
import Talent from '@/Shared/component/Talent.vue';
import Stats from '@/Shared/component/Stats.vue';
import Weapon from '@/Shared/component/Weapon.vue';
import Flower from '@/Shared/component/Flower.vue';
import Plume from '@/Shared/component/Plume.vue';
import Sands from '@/Shared/component/Sands.vue';
import Goblet from '@/Shared/component/Goblet.vue';
import Circlet from '@/Shared/component/Circlet.vue';
import VueFeather from 'vue-feather';

export default {
    components:{
        Head, Link,
        Guest,
        Tab, Tabs, TabPanel, TabPanels,
        Pagination,
        Charts,
        apexcharts: VueApexCharts, VueFeather,
        avatar, weaponRecom, artifact,
        CharLv,
        WeaponCharts, Party, FourPcs, TwoPcs, TalentChart, 
         Equip, Conste, Talent, Stats, Weapon, Flower, Plume, Sands, Goblet, Circlet,
    },
    props: {
        title: String,
        character: Object,
        weaponName: Object,
        totalWeapon: Object,
        weaponRecom: Object,
        art4Name: Object,
        totalArt4: Object,
        art2Name: Object,
        totalArt2: Object,
        art4Recom: Object,
        art2Recom: Object,
        normalAttack: Object,
        elementalSkill: Object,
        elementalBurst: Object,
        build:Object,
    },
   
    setup() {
        const active = ref(0);
        const activeTabPcs = ref(0);
        const activeTabArt = ref(0);
        const activeTabLv = ref(0);
        const activeTabTalent = ref(0);

        return { active, activeTabPcs, activeTabArt, activeTabLv, activeTabTalent };
    },
    methods:{
        searchUID(uid){
            this.$inertia.get(`/u/${uid}`, {}, { preserveScroll: true });
        },
         showAvatar() {
                return "/storage/images/icon/avatar/";
            }, 
        bgElement(){
            const ele = this.build[0].character.element;
                if(ele == "Ice"){
                    return "../image/element/bgCryo.jpg"
                } else if(ele == "Rock"){
                    return "../image/element/bgGeo.jpg"
                } else if(ele == "Dendro"){
                    return "../image/element/bgDendro.jpg"
                } else if(ele == "Wind"){
                    return "../image/element/bgAnemo.jpg"
                } else if(ele == "Electric"){
                    return "../image/element/bgElectro.jpg"
                } else if(ele == "Water"){
                    return "../image/element/bgHydro.jpg"
                } else if(ele == "Fire"){
                    return "../image/element/bgPyro.jpg"
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
