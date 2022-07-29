<template>
    <Head>
        <title>Profile</title>
    </Head>
        <Guest>
            <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{character.name}} Builds
                </h2>
            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="flex justify-between md:justify-between">
            <div class="form-control">
                <input type="text" v-model="term.search"  placeholder="Search"
                class="block ml-auto rounded-md mb-4 dark:bg-dark-eval-1">
            </div>
                    
            </div>
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
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-dark-eval-3" v-for="data in build.data" :key="data.id">
                                    <tr v-if="data.character.slug == character.slug">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <Link @click="api(data)" :href="route('showBuild', { id: data.id })">
                                                <div class="avatar">
                                                    <div class="w-24 rounded-xl">
                                                        <img :src="character.icon" />
                                                    </div>
                                                </div>
                                                </Link>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ character.name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        By {{ data.name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="avatar">
                                                <div class="w-12 rounded-xl">
                                                    <img :src="data.weapon.icon">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-2"> 
                                                <img src="/image/attribute/Icon_Attribute_Health.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.hp}}</strong>
                                            </div>

                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Attack.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.atk}}</strong> 
                                            </div> 
                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Defense.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.defense}}</strong> 
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.em}}</strong>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-white">
                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Critical_Hit.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.c_rate}} %</strong> 
                                            </div> 
                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Critical_Hit.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.c_damage}} %</strong> 
                                            </div>
                                            <div class="flex items-center gap-2" v-if="data.healing_bonus > 0">
                                                <img src="/image/attribute/Icon_Attribute_Healing.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.healing_bonus}} %</strong>
                                            </div> 
                                            <div class="flex items-center gap-2"> 
                                                <img src="/image/attribute/Icon_Attribute_Energy_Recharge.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.er}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-if="data.elemental_dmg > 0 && data.main_goblet =='Pyro DMG Bonus'"> 
                                                <img  src="/image/attribute/Pyro.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="data.elemental_dmg > 0 && data.main_goblet =='Hydro DMG Bonus'"> 
                                                <img  src="/image/attribute/Hydro.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="data.elemental_dmg > 0 && data.main_goblet =='Anemo DMG Bonus'"> 
                                                <img  src="/image/attribute/Anemo.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="data.elemental_dmg > 0 && data.main_goblet =='Electro DMG Bonus'"> 
                                                <img  src="/image/attribute/Electro.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="data.elemental_dmg > 0 && data.main_goblet =='Dendro DMG Bonus'"> 
                                                <img  src="/image/attribute/Dendro.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="data.elemental_dmg > 0 && data.main_goblet =='Cryo DMG Bonus'"> 
                                                <img  src="/image/attribute/Cryo.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-else-if="data.elemental_dmg > 0 && data.main_goblet =='Geo DMG Bonus'"> 
                                                <img  src="/image/attribute/Geo.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.elemental_dmg}} %</strong>
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
                                                <strong class="mr-2">{{data.elemental_dmg}} %</strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-if="data.physical_dmg > 0"> 
                                                <img src="/image/attribute/Icon_Attribute_Physical2.png" class="w-8 h-8">
                                                <strong class="flex-1 w-64">Physical DMG Bonus</strong>
                                                <strong class="mr-2">{{data.physical_dmg}} %</strong>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-white">
                                            <div class="flex items-center gap-2" > 
                                                <VueFeather type="heart" size="18" stroke="red" fill="red"></VueFeather>
                                                {{data.likes_count}}
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
        character: Object,
        build: Object,
        filters: Object,
        search_url: Object,
        artifacts: {
			type: Object,
			 default(rawProps) {
				return GenshinDb.artifacts('names', { matchCategories: true });
			    }
            },
        weapons: {
			type: Object,
			 default(rawProps) {
				return GenshinDb.weapons('names', { matchCategories: true });
			    }
            },
    },
    data() {
        return{
        name: '',
        term: {
                search: this.filters.search,
            },
        }
    },
    watch: {
            term: {
                deep: true,
                handler: throttle(function () {
                    this.$inertia.get(this.search_url, pickBy(this.term), { preserveState: true })
                }, 150),
            },
        },
    methods: {
     api(data){
            const i = data.set4.name;
            const a = data.weapon.name;
            const artifact = GenshinDb.artifacts(i);
            const weapon = GenshinDb.weapons(a);
            const weaponStats = GenshinDb.weapons(a).stats(90);
            localStorage.setItem('artifact', JSON.stringify(artifact));
            localStorage.setItem('weapon', JSON.stringify(weapon));
            localStorage.setItem('weaponStats', JSON.stringify(weaponStats));
        },
    },
}


</script>