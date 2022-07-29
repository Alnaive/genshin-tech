<template>
    <Head>
        <title>Profile</title>
    </Head>
        <Guest>
            <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div class="alert bg-red-500" v-if="!$page.props.auth.user">
                <div class="flex-1 space-x-2" >
                    <vue-feather type="info" ></vue-feather>
                    <label>Your build may can lost if your IP Address {{ipAddress}} has changed.</label>
                </div>
            </div>
            </div>
            </template>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50 dark:bg-dark-eval-2 ">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">Equipment</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Basic Stats
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Advance Stats
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider"> Like</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-dark-eval-3" v-for="dataBuild in build.data" :key="dataBuild.id">
                                    <tr v-if="ipAddress == dataBuild.ip">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <Link @click="api(dataBuild)" :href="route('showBuild', { id: dataBuild.id })">
                                                <div class="avatar">
                                                    <div class="w-24 rounded-xl">
                                                        <img :src="dataBuild.character.icon" />
                                                    </div>
                                                </div>
                                                </Link>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ dataBuild.character.name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        By {{ dataBuild.name }} 
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ dataBuild.status }} 
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="avatar">
                                                <div class="w-12 rounded-xl">
                                                    <img :src="dataBuild.weapon.icon">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-2"> 
                                                <img src="/image/attribute/Icon_Attribute_Health.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.hp}}</strong>
                                            </div>

                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Attack.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.atk}}</strong> 
                                            </div> 
                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Defense.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.defense}}</strong> 
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.em}}</strong>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-white">
                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Critical_Hit.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.c_rate}} %</strong> 
                                            </div> 
                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Critical_Hit.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.c_damage}} %</strong> 
                                            </div>
                                            <div class="flex items-center gap-2" v-if="dataBuild.healing_bonus > 0">
                                                <img src="/image/attribute/Icon_Attribute_Healing.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.healing_bonus}} %</strong>
                                            </div> 
                                            <div class="flex items-center gap-2"> 
                                                <img src="/image/attribute/Icon_Attribute_Energy_Recharge.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.er}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-if="dataBuild.elemental_dmg > 0 && dataBuild.main_goblet =='Pyro DMG Bonus'"> 
                                                <img  src="/image/attribute/Pyro.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="dataBuild.elemental_dmg > 0 && dataBuild.main_goblet =='Hydro DMG Bonus'"> 
                                                <img  src="/image/attribute/Hydro.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="dataBuild.elemental_dmg > 0 && dataBuild.main_goblet =='Anemo DMG Bonus'"> 
                                                <img  src="/image/attribute/Anemo.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="dataBuild.elemental_dmg > 0 && dataBuild.main_goblet =='Electro DMG Bonus'"> 
                                                <img  src="/image/attribute/Electro.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="dataBuild.elemental_dmg > 0 && dataBuild.main_goblet =='Dendro DMG Bonus'"> 
                                                <img  src="/image/attribute/Dendro.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="dataBuild.elemental_dmg > 0 && dataBuild.main_goblet =='Cryo DMG Bonus'"> 
                                                <img  src="/image/attribute/Cryo.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="dataBuild.elemental_dmg > 0 && dataBuild.main_goblet =='Geo DMG Bonus'"> 
                                                <img  src="/image/attribute/Geo.png" class="w-8 h-8">
                                                <strong class="mr-2">{{dataBuild.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="elemental_dmg > 0 "> 
                                                <img  :src="showElement()" class="w-8 h-8">
                                                <strong class="flex-1 w-64" v-if="character.element == 'Geo'">Geo DMG Bonus</strong>
                                                <strong class="flex-1 w-64" v-else-if="character.element == 'Cryo'">Cryo DMG Bonus</strong>
                                                <strong class="flex-1 w-64" v-else-if="character.element == 'Dendro'">Dendro DMG Bonus</strong>
                                                <strong class="flex-1 w-64" v-else-if="character.element == 'Electro'">Electro DMG Bonus</strong>
                                                <strong class="flex-1 w-64" v-else-if="character.element == 'Anemo'">Anemo DMG Bonus</strong>
                                                <strong class="flex-1 w-64" v-else-if="character.element == 'Hydro'">Hydro DMG Bonus</strong>
                                                <strong class="flex-1 w-64" v-else-if="character.element == 'Pyro'">Pyro DMG Bonus</strong>
                                                <strong class="mr-2">{{dataBuild.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-if="dataBuild.physical_dmg > 0"> 
                                                <img src="/image/attribute/Icon_Attribute_Physical2.png" class="w-8 h-8">
                                                <strong class="flex-1 w-64">Physical DMG Bonus</strong>
                                                <strong class="mr-2">{{dataBuild.physical_dmg}} %</strong>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-white">
                                            <div class="flex items-center gap-2" > 
                                                <VueFeather type="heart" size="18" stroke="red" fill="red"></VueFeather>
                                                {{dataBuild.likes_count}}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <pagination class="mt-6" :links="build.links" />
                        </div>
                    </div>
                </div>
            </div>
        </Guest>
</template>

<script>
import { Head, Link, useForm, usePage  } from '@inertiajs/inertia-vue3';
import Guest from '@/Layouts/Guest.vue'
    import Pagination from '@/Components/Pagination'
import pickBy from 'lodash/pickBy'
    import throttle from 'lodash/throttle'
import VueFeather from 'vue-feather';

export default {
    components: {
      Head,
      Link,
      Guest, Pagination, VueFeather,
     
    },
    props: {
        ipAddress: Object,
        build: Object,
        filters: Object,
        user: Object,
    },
    data() {
        return{
        term: {
                search: this.filters.search,
            },
        }
    },
    watch: {
            term: {
                deep: true,
                handler: throttle(function () {
                    this.$inertia.get(this.route('guess', this.ipAdress), pickBy(this.term), { preserveState: true })
                }, 150),
            },
        },
    methods:{
        showCharacter() {
                return "/storage/images/icon/character/";
            },
             update(id) {
            this.$inertia.put(route("updateBuildAccount", id));
        },
    }
}


</script>
<style>
    .rounded-br-3xl{
        color: white;
    }
</style>