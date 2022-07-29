<template>
    <Head>
        <title>Profile</title>
    </Head>
        <Guest>
            <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                   Profile
                </h2>
            </div>
            </template>
            <div class="flex flex-wrap gap-4">
                <div class="card  p-6 w-80 shadow-xl bg-content dark:bg-base-100">
                    <div class="flex items-center gap-4">
                        <div class="avatar">
                            <div class="w-24 rounded-full">
                                <img :src="user.avatar">
                            </div>
                        </div>
                        <p>{{user.name}} <br>
                        Null</p>
                    </div>
                    <div class="divider">Reports</div>
                    <div class="stat">
                        <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <div class="stat-title">Total Likes</div>
                        <div class="stat-value text-primary">25.6K</div>
                    </div>
                    <div class="stat">
                        <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div class="stat-title">Total Build</div>
                        <div class="stat-value text-secondary">{{user.build_count}}</div>
                    </div>
                </div>
            </div>
            <div class="divider">Build</div>
            <div class="flex">
                <div class="form-control">
                <input type="text" v-model="term.search"  placeholder="Search Character"
                class="block ml-auto rounded-md mb-4 dark:bg-dark-eval-1">
            </div>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-dark-eval-2 ">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                            Equipment
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody v-for="build in builds.data" :key="build.id" class="bg-white divide-y divide-gray-200 dark:bg-dark-eval-3">
                    <tr v-if="build.user_id == user.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img :src="showCharacter()+build.character.char_icon"
                                        class="h-10 w-10 rounded-full" />
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{build.character.char_name}}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        Lv {{build.char_lv}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">
                                {{build.weapon.name}}
                            </div>
                            <div v-if="!build.four_pcs_art" class="text-sm text-gray-500">
                                <p v-for="twoPcs in build.set2" :key="twoPcs.id">
                                    {{twoPcs.name}}
                                </p>
                            </div>
                            <div v-else class="text-sm text-gray-500">{{build.set4.name}}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-white">
                            {{build.status}}
                        </td>

                        <td v-if="user.id == $page.props.auth.user.id" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <Link :href="route('editBuild', { id: build.id })"
                                class="text-indigo-600 hover:text-indigo-900 dark:text-white">Edit
                            </Link>
                            <Link @click="destroy(build.id)"
                                class="text-indigo-600 hover:text-indigo-900 dark:text-white">Delete
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
            <pagination class="mt-6" :links="builds.links" />
       
        </Guest>

    
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Guest from '@/Layouts/Guest.vue'
    import Pagination from '@/Components/Pagination'
import pickBy from 'lodash/pickBy'
    import throttle from 'lodash/throttle'
export default {
    components: {
      Head,
      Link,
      Guest, Pagination,
     
    },
    props: {
        user: Object,
        builds: Object,
        filters: Object,
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
                    this.$inertia.get(this.route('showUser', this.user.id), pickBy(this.term), { preserveState: true })
                }, 150),
            },
        },
    methods:{
        showCharacter() {
                return "/storage/images/icon/character/";
            },
    }
}


</script>
<style>
    .rounded-br-3xl{
        color: white;
    }
</style>