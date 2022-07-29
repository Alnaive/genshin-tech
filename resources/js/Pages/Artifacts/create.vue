<template>

    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            </div>
        </template>
       <div class="flex flex-wrap space-x-3 justify-center p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
           <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50 dark:bg-dark-eval-2 ">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Art
                                        </th>
                                    </tr>
                                    <th scope="col"  class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    </th>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-dark-eval-3">
                                    <tr v-for="(item, index) in artifactSet" :key="index">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                   <img :src="`https://enka.shinshin.moe/ui/${item.setIcon}.png`" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                         <!-- ID : {{item.id}} <br> {{item.equipType}} -->
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        <!-- RankLevel : {{item.rankLevel}} <br> Rank : {{item.rank}} <br> setID : {{item.setId}} -->
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <Link :href="route('getArtifactApi')" @click="artData(item)" class="transform hover:scale-105 duration-500 ease-in-out hover:green-500" >
                                                Add
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
            
        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import {Head,useForm, Link} from '@inertiajs/inertia-vue3'
    import {reactive} from 'vue'
    const GenshinDb = require('genshin-db');

    export default {
        components: {
            BreezeAuthenticatedLayout,
            Head,
            Link,
        },
        props: {
            artifactSet: Object,
        },
       
        setup(props) {
            const form = reactive({
                name: '',
        })
        return { form,  };
        },
        methods: {
           artData(item){
               const i =  item;
               localStorage.setItem('setArt', JSON.stringify(i));
           },
           findID(){
               const i = this.artifacts;
               i.find(setId == this.art.setId);
               console.log(i);
           }
        },
    }

</script>
