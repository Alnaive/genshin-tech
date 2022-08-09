<template>
    <Guest>
        <template #header>
            <div class="flex flex-col gap-2 md:flex-row">
                <form @submit.prevent="searchUID(uid)">
                    <div class="flex flex-row space-x-4">
                        <input type="text" v-model="uid" placeholder="Type UID" class="input bg-white dark:bg-base-100" />
                        <button class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </template>
        <div class="flex flex-wrap flex-col grow-1 justify-center gap-1 md:flex-row">
            <div v-for="build in builds.data" :key="build.id" class="card glass w-[300px] justify-center card-side flex   items-center p-2">
                <Link :href="route('showBuild', {id : build.id})">
                <figure class="relative">
                <img class="w-24 h-24" :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${build.character.icon}.png`" alt="" srcset="">
                    <div v-if="build.character.rarity == 5" class="absolute inset-x-0 bottom-[-53px] flex flex-row items-center">
                            <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                            <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                            <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                            <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                            <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                    </div>
                    <div v-else-if="build.character.rarity == 4" class="absolute inset-x-0 bottom-[-53px] left-[5px] flex flex-row items-center">
                            <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                            <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                            <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                            <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                    </div>
                </figure>
                </Link>
                <div class="">
                    <div class="flex items-center gap-2"> 
                        <img src="/image/attribute/Icon_Attribute_Health.png" class="w-8 h-8">
                        <strong class="mr-2">{{build.hp}}</strong>
                    </div>

                    <div class="flex items-center gap-2">
                        <img src="/image/attribute/Icon_Attribute_Attack.png" class="w-8 h-8">
                        <strong class="mr-2">{{build.attack}}</strong> 
                    </div> 
                    <div class="flex items-center gap-2">
                        <img src="/image/attribute/Icon_Attribute_Defense.png" class="w-8 h-8">
                        <strong class="mr-2">{{build.defense}}</strong> 
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" class="w-8 h-8">
                        <strong class="mr-2">{{build.elementalMastery}}</strong>
                    </div>
                </div>
                <div class="">
                    <div class="flex items-center gap-2">
                        <img src="/image/svg/FIGHT_PROP_CRITICAL.svg" class="w-8 h-7">
                        <strong class="mr-2 "> <span >{{ build.criticalRate }}%</span> <br>
                        </strong>
                    </div>
                        <div class="flex items-center gap-2">
                        <img src="/image/attribute/Icon_Attribute_Critical_Damage.png" class="w-8 h-8">
                        <strong class="mr-2 "> <span >{{ build.criticalDamage }}%</span> <br>
                        </strong>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="/image/attribute/Icon_Attribute_Energy_Recharge.png" class="w-8 h-8">
                        <strong class="mr-2 "> <span >{{ build.energyRecharge }}%</span> <br>
                        </strong>
                    </div>
                    <div class="flex items-center gap-2" v-if="build.healingBonus > 0">
                        <img src="/image/attribute/Icon_Attribute_Healing.png" class="w-8 h-8">
                        <strong class="mr-2 "> <span >{{ build.healingBonus }}%</span> <br>
                        </strong>
                    </div>
                    <div class="flex items-center gap-2" v-if="build.character.element == 'Water' && build.hydroDamageBonus > 0">
                        <img src="/image/attribute/Hydro.png" class="w-8 h-8">
                        <strong class="mr-2 "> <span >{{ build.hydroDamageBonus }}%</span> <br>
                        </strong>
                    </div>
                    <div class="flex items-center gap-2" v-if="build.character.element == 'Wind' && build.anemoDamageBonus > 0">
                        <img src="/image/attribute/Anemo.png" class="w-8 h-8">
                        <strong class="mr-2 "> <span >{{ build.anemoDamageBonus }}%</span> <br>
                        </strong>
                    </div> 
                    <div class="flex items-center gap-2" v-if="build.character.element == 'Fire' && build.pyroDamageBonus > 0">
                        <img src="/image/attribute/Pyro.png" class="w-8 h-8">
                        <strong class="mr-2 "> <span >{{ build.pyroDamageBonus }}%</span> <br>
                        </strong>
                    </div>
                    <div class="flex items-center gap-2" v-if="build.character.element == 'Ice' && build.cryoDamageBonus > 0">
                        <img src="/image/attribute/Cryo.png" class="w-8 h-8">
                        <strong class="mr-2 "> <span >{{ build.cryoDamageBonus }}%</span> <br>
                        </strong>
                    </div>
                    <div class="flex items-center gap-2" v-if="build.character.element == 'Electric' && build.electroDamageBonus > 0">
                        <img src="/image/attribute/Electro.png" class="w-8 h-8">
                        <strong class="mr-2 "> <span >{{ build.electroDamageBonus }}%</span> <br>
                        </strong>
                    </div>
                    <div class="flex items-center gap-2" v-if="build.character.element == 'Rock' && build.geoDamageBonus > 0">
                        <img src="/image/attribute/Geo.png" class="w-8 h-8">
                        <strong class="mr-2 "> <span >{{ build.geoDamageBonus }}%</span> <br>
                        </strong>
                    </div>
                    <div class="flex items-center gap-2" v-if="build.physicalDamageBonus > 0">
                        <img src="/image/attribute/Icon_Attribute_Physical2.png" class="w-8 h-8">
                        <strong class="mr-2 "> <span >{{ build.physicalDamageBonus }}%</span> <br>
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </Guest>
</template>
<script>
import { Link, } from '@inertiajs/inertia-vue3';
import Guest from '@/Layouts/Guest.vue';
import VueFeather from 'vue-feather';
export default{
    components:{
        Link,  Guest, VueFeather,
    },
    props:{
        builds: Object,
    },
    data(){
        return{
            uid: null,
        }
    },
    methods:{
        searchUID(uid){
            this.$inertia.get(`/showcase/build/${uid}`, {}, { preserveScroll: true });
        },
    }
}

</script>