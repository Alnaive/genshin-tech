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
                                                        <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${character.icon}`" />
                                                    </div>
                                                </div>
                                                </Link>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ character.name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        By {{ data.nickname }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="avatar">
                                                <div class="w-12 rounded-xl">
                                                    <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${data.weapon.icon}`">
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
                                                <strong class="mr-2">{{data.attack}}</strong> 
                                            </div> 
                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Defense.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.defense}}</strong> 
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" class="w-8 h-8">
                                                <strong class="mr-2">{{data.elementalMastery}}</strong>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-white">
                                           <div class="flex items-center gap-2">
                                                <img src="/image/svg/FIGHT_PROP_CRITICAL.svg" class="w-8 h-7">
                                                <strong class="mr-2 "> <span >{{ data.criticalRate }}%</span> <br>
                                                </strong>
                                            </div>
                                                <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Critical_Damage.png" class="w-8 h-8">
                                                <strong class="mr-2 "> <span >{{ data.criticalDamage }}%</span> <br>
                                                </strong>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <img src="/image/attribute/Icon_Attribute_Energy_Recharge.png" class="w-8 h-8">
                                                <strong class="mr-2 "> <span >{{ data.energyRecharge }}%</span> <br>
                                                </strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-if="data.healingBonus > 0">
                                                <img src="/image/attribute/Icon_Attribute_Healing.png" class="w-8 h-8">
                                                <strong class="mr-2 "> <span >{{ data.healingBonus }}%</span> <br>
                                                </strong>
                                            </div>
                                           <div class="flex items-center gap-2" v-if="character.element == 'Water' && data.hydroDamageBonus > 0">
                                                <img src="/image/attribute/Hydro.png" class="w-8 h-8">
                                                <strong class="mr-2 "> <span >{{ data.hydroDamageBonus }}%</span> <br>
                                                </strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-if="character.element == 'Wind' && data.anemoDamageBonus > 0">
                                                <img src="/image/attribute/Anemo.png" class="w-8 h-8">
                                                <strong class="mr-2 "> <span >{{ data.anemoDamageBonus }}%</span> <br>
                                                </strong>
                                            </div> 
                                            <div class="flex items-center gap-2" v-if="character.element == 'Fire' && data.pyroDamageBonus > 0">
                                                <img src="/image/attribute/Pyro.png" class="w-8 h-8">
                                                <strong class="mr-2 "> <span >{{ data.pyroDamageBonus }}%</span> <br>
                                                </strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-if="character.element == 'Ice' && data.cryoDamageBonus > 0">
                                                <img src="/image/attribute/Cryo.png" class="w-8 h-8">
                                                <strong class="mr-2 "> <span >{{ data.cryoDamageBonus }}%</span> <br>
                                                </strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-if="character.element == 'Electric' && data.electroDamageBonus > 0">
                                                <img src="/image/attribute/Electro.png" class="w-8 h-8">
                                                <strong class="mr-2 "> <span >{{ data.electroDamageBonus }}%</span> <br>
                                                </strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-if="character.element == 'Rock' && data.geoDamageBonus > 0">
                                                <img src="/image/attribute/Geo.png" class="w-8 h-8">
                                                <strong class="mr-2 "> <span >{{ data.geoDamageBonus }}%</span> <br>
                                                </strong>
                                            </div>
                                            <div class="flex items-center gap-2" v-if="data.physicalDamageBonus > 0">
                                                <img src="/image/attribute/Icon_Attribute_Physical2.png" class="w-8 h-8">
                                                <strong class="mr-2 "> <span >{{ data.physicalDamageBonus }}%</span> <br>
                                                </strong>
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
}


</script>