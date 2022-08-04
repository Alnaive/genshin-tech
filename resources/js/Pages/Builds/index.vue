<template>

    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{title}}
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
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Character Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Nickname
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Server
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-dark-eval-3">
                                    <tr v-for="build in builds.data" :key="build.id">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${build.character.icon}`"
                                                        class="h-10 w-10 rounded-full" />
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ build.character.name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ build.character.rarity }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ build.uid }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ build.nickname }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-white">
                                            {{ build.serverId}}
                                        </td>

                                        <td class="space-x-2 px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <Link :href="route('showBuild', { id: build.id })"
                                                class="link text-indigo-600 hover:text-indigo-900 dark:text-white">Detail
                                            </Link><button @click="destroy(build.id)"
                                                class="link text-indigo-600 hover:text-indigo-900 dark:text-white">Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <pagination class="mt-6" :links="builds.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import {Head,useForm, Link} from '@inertiajs/inertia-vue3'
    import Pagination from '@/Components/Pagination'
    import pickBy from 'lodash/pickBy'
    import throttle from 'lodash/throttle'

    export default {
        components: {
            BreezeAuthenticatedLayout,
            Head,
            Pagination,
            Link,

        },
        props: {
            builds: Object,
            filters: Object,
        },
        data() {
            return {
                term: {
                    search: this.filters.search,
                },
            }
        },
        watch: {
            term: {
                deep: true,
                handler: throttle(function () {
                    this.$inertia.get(this.route('Builds.index'), pickBy(this.term), { preserveState: true })
                }, 150),
            },
        },
        methods: {
            
            destroy(id) {
            this.$inertia.delete(route("Builds.destroy", id));
            console.log(id);
            },
            showImage() {
                return "/storage/images/icon/character/";
            },
             showAvatar() {
                return "/storage/images/icon/avatar/";
            }, 
            showWeapon() {
                return "/storage/images/icon/weapon/";
            },
            showTalent() {
                return "/storage/images/icon/talent/";
            },
            showArtifact() {
                return "/storage/images/icon/artifact/";
            }, 
            showCharacterIcon(){
                return "/storage/images/icon/character/";
            },
            showConstellation() {
                return "/storage/images/icon/constellation/";
            },
            showElement(){
            const ele = this.characters.element;
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
            bg5(){
                return "/image/rarity/Background_Item_5_Star.png"
            },
            bg4(){
                return "/image/rarity/Background_Item_4_Star.png"
            },
            bg3(){
                return "/image/rarity/Background_Item_3_Star.png"
            },
            bg2(){
                return "/image/rarity/Background_Item_2_Star.png"
            },
            bg1(){
                return "/image/rarity/Background_Item_1_Star.png"
            },
        },
    }

</script>
