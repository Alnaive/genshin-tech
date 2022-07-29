<template>
    <Head>
        <title>{{title}}</title>
    </Head>
    <Guest>
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
            <!-- <tab>Profile</tab> -->
        </tabs>
        </div>
         <tab-panels v-model="active">
            <tab-panel >
                <div class="grid gap-3 overflow-hidden xl:grid-cols-3 xl:grid-rows-3 xl:gap-5 xl:grid-flow-col lg:grid-cols-2 lg:grid-rows-4 lg:gap-3 lg:grid-flow-col w-auto">
                    <div class="card image-full bg-white dark:bg-dark-eval-1">
                        <avatar :character="character" :char="char"></avatar>
                    </div>
                    <div class="card bg-white dark:bg-dark-eval-1">
                        <div class="card-body">
                            <h2 class="card-title">Artifact Recommendation</h2>
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
                    <div class="card bg-white dark:bg-dark-eval-1 xl:col-span-2 xl:row-start-3 lg:row-start-4 lg:col-span-1 ">
                        <WeaponCharts :weapon_name="weapon_name" :weapon_count="weapon_count" :title="title"> </WeaponCharts>
                    </div>
                    <div class="card bg-white dark:bg-dark-eval-1">
                        <div class="card-body ">
                        <h2 class="card-title">Stats Overview</h2>
                            <div class="divider"><strong>Median</strong></div>
                            <div class="flex items-center gap-2"> 
                                <img src="/image/attribute/Icon_Attribute_Health.png" class="w-8 h-8">
                                <strong class="flex-1 w-64">Max Hp</strong>
                                <strong class="mr-2">{{HpFormat}}</strong>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="/image/attribute/Icon_Attribute_Attack.png" class="w-8 h-8">
                                <strong class="flex-1 w-64">Attack</strong>
                                <strong class="mr-2">{{AtkFormat}}</strong> 
                            </div> 
                            <div class="flex items-center gap-2">
                                <img src="/image/attribute/Icon_Attribute_Defense.png" class="w-8 h-8">
                                <strong class="flex-1 w-64">Defense</strong>
                                <strong class="mr-2">{{DefenseFormat}}</strong> 
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" class="w-8 h-8">
                                <strong class="flex-1 w-64">Elemental Mastery</strong> 
                                <strong class="mr-2">{{EmFormat}}</strong>
                            </div>
                            <div class="flex items-center gap-2"> 
                                <img src="/image/attribute/Icon_Attribute_Energy_Recharge.png" class="w-8 h-8">
                                <strong class="flex-1 w-64">Energy Recharge</strong>
                                <strong class="mr-2">{{medianEr}} %</strong>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="/image/attribute/Icon_Attribute_Critical_Hit.png" class="w-8 h-8">
                                <strong class="flex-1 w-64">CRIT Rate</strong>
                                <strong class="mr-2">{{medianCritRate}} %</strong> 
                            </div> 
                            <div class="flex items-center gap-2">
                                <img src="/image/attribute/Icon_Attribute_Critical_Hit.png" class="w-8 h-8">
                                <strong class="flex-1 w-64">CRIT Damage</strong>
                                <strong class="mr-2">{{medianCritDamage}} %</strong> 
                            </div>
                        </div>
                    </div>
                    <div class="card bg-white dark:bg-dark-eval-1">
                        <div class="card-body ">
                            <h2 class="card-title">Weapon Recommendation</h2>
                             <div class="flex flex-wrap justify-center">
                                 <weapon :weaponRecom="weaponRecom"/>
                             </div>
                        </div>
                    </div>
                    <div class="card bg-white dark:bg-dark-eval-1">
                        <div class="flex flex-wrap ml-5">
                            <tabs v-model="activeTabLv">
                            <tab>Party</tab>
                            <tab>Lv</tab>
                        </tabs>
                        </div>
                        <tab-panels v-model="activeTabLv">
                            <tab-panel><Party :totalParty="totalParty" :partyName="partyName" :title="title"></Party></tab-panel>
                            <tab-panel><CharLv :lv="lv" :total_lv="total_lv" :title="title"></CharLv></tab-panel>
                        </tab-panels>
                         
                    </div>
                    <div class="card bg-white dark:bg-dark-eval-1">
                        <div class="flex flex-wrap ml-5">
                            <tabs v-model="activeTabTalent">
                            <tab>Normal Attack</tab>
                            <tab>Elemental Skill</tab>
                            <tab>Elemental Burst</tab>
                        </tabs>
                        </div>
                        <tab-panels v-model="activeTabTalent">
                            <tab-panel><Talent :t1="t1" :t1Label="t1Label" /></tab-panel>
                            <tab-panel><Talent2 :t2="t2" :t2Label="t2Label" /></tab-panel>
                            <tab-panel><Talent3 :t3="t3" :t3Label="t3Label" /></tab-panel>
                        </tab-panels>
                    </div>
                    <div class="card bg-white dark:bg-dark-eval-1 xl:col-span-1 xl:row-start-8 lg:row-start-3 lg:col-start-1">
                        <div class="flex flex-wrap ml-5">
                            <tabs v-model="activeTabArt">
                            <tab>4 Set</tab>
                            <tab>2 Set</tab>
                        </tabs>
                        </div>
                        <tab-panels v-model="activeTabArt">
                            <tab-panel><FourPcs :art4Name="art4Name" :art4Total="art4Total" /></tab-panel>
                            <tab-panel><TwoPcs :art2Name="art2Name" :art2Total="art2Total" /></tab-panel>
                        </tab-panels>
                    </div>
                </div>
            </tab-panel>
            <tab-panel>
                  Null
            </tab-panel>
            
            </tab-panels>
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
import weapon from './Component/weapon.vue'
import artifact from './Component/artifact.vue'
import CharLv from './Component/charts/char_lv'
import Party from './Component/charts/Party'
import WeaponCharts from './Component/charts/weapon'
import FourPcs from './Component/charts/four_pcs_art.vue'
import TwoPcs from './Component/charts/two_pcs_art.vue'
import Talent from './Component/charts/talent.vue'
import Talent2 from './Component/charts/talent2.vue'
import Talent3 from './Component/charts/talent3.vue'
 import Pagination from '@/Components/Pagination'

export default {
    components:{
        Head, Link,
        Guest,
        Tab, Tabs, TabPanel, TabPanels,
        Pagination,
        Charts,
        apexcharts: VueApexCharts,
        avatar, weapon, artifact,
        CharLv,
        WeaponCharts, Party, FourPcs, TwoPcs, Talent, Talent2, Talent3,
    },
    props: {
        title: String,
        character: Object,
        builds: Object,
        weapon_count: Object,
        weapon_name: Object,
        weaponRecom: Object,
        art2Recom: Object,
        art4Recom: Object,
        lv: Object,
        total_lv: Object,
        agent: Object,
        t1Label: Array,
        t1: Array,
        t2: Array,
        t2Label: Array,
        t3: Array,
        t3Label: Array,
        totalParty: Array,
        partyName: Object,
        art4Total: Object, 
        art4Name: Object,
        art2Total: Object,
        art2Name: Object,
        medianHp : String,
        medianAtk : String,
        medianDefense : String,
        medianEm : String,
        medianCritRate : String,
        medianCritDamage : String,
        medianEr : String,
        char: {
                type: Object,
                default(rawProps) {
                    return JSON.parse(localStorage.getItem('character')) || []
                }
            },
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
     computed:{
        HpFormat(){
            const formatter = new Intl.NumberFormat('us');
                return formatter.format(this.medianHp);
            },
        AtkFormat(){
            const formatter = new Intl.NumberFormat('us');
                return formatter.format(this.medianAtk);
            },
        DefenseFormat(){
            const formatter = new Intl.NumberFormat('us');
                return formatter.format(this.medianDefense);
            },
        EmFormat(){
            const formatter = new Intl.NumberFormat('us');
                return formatter.format(this.medianEm) ;
            },
        }
    
}
</script>

<style>
    .card.image-full:before{
        background-color: transparent;
    }
</style>
