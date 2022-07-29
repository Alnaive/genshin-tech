<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Dashboard
                </h2>
            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
               <h1>Total draft {{builds.total}}</h1><br>
           <div class="overflow-x-auto">
            <table class="table w-full">
                <!-- head -->
                <thead>
                <tr>
                    <th>Name</th>
                    <th>IP</th>
                    <th>Country</th>
                    <th>User</th>
                    <th></th>
                </tr>
                </thead>
                <tbody >
                <!-- row 1 -->
                <tr v-for="build in builds.data" :key="build.id">
                    <td>{{build.character.name}}</td>
                    <td>{{build.ip}}</td>
                    <td>{{build.country}}</td>
                    <td><p v-if="!build.user_id">{{build.name}}  <span class="badge badge-info">Guest</span></p>
                        <p v-else>{{build.user.name}} <span class="badge badge-info">User</span></p>
                    </td>
                    <td class="space-x-2"><!-- The button to open modal -->
                        <label :for="'my-modal-4'+build.id" class="btn btn-info modal-button">Detail</label>
                        <input type="checkbox" :id="'my-modal-4'+build.id" class="modal-toggle">
                        <label :for="'my-modal-4'+build.id" class="modal cursor-pointer">
                        <label class="modal-box bg-accent-content dark:bg-black" for="">
                            <div class="artboard phone-5 artboard-demo card shadow-xl image-full bg-accent-content dark:bg-base-100">
                                <figure>
                                    <img :src="showAvatar() + build.character.avatar" >
                                </figure> 
                                <div class="">
                                    <h3 class="text-center text-black dark:text-white absolute inset-x-0 top-0 mt-5">{{build.character.name}} Lv {{build.char_lv}}
                                        <br> <p > {{build.name}} </p>
                                    </h3>
                                    <Equip :build="build" :artifactPcs="artifactPcs" :weapons="weapons" 
                                    ></Equip>
                                    <Party :build="build" :characters="characters"
                                    > 
                                    </Party>
                                    <Conste :build="build"/>
                                    <Talent :build="build"/> 
                                </div>
                                <div class="card absolute inset-x-0 bottom-0 mt-5">
                                    <div class="bg-base-content text-black dark:bg-dark-eval-3 dark:text-white" >
                                        <section class="px-2 py-2" >
                                            <Stats :build="build"/>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </label>
                        </label>
                        <Link @click="update(build.id)" class="btn btn-success">Publish</Link><Link :href="route('editBuild', {id: build.id})" class="btn btn-primary">Edit</Link><Link @click="destroy(build.id)" class="btn btn-secondary">Delete</Link> 
                    </td>
                    <th></th>
                </tr>
                </tbody>
            </table>
            <pagination class="mt-6" :links="builds.links" />
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import Pagination from '@/Components/Pagination'
import pickBy from 'lodash/pickBy'
    import throttle from 'lodash/throttle'
import Party from './Component/Party.vue'
import Equip from './Component/Equip.vue';
import Talent from './Component/Talent.vue';
import Stats from './Component/Stats.vue';
import Conste from './Component/Conste.vue';
import q1 from './Component/Charts/q1.vue';
import q2 from './Component/Charts/q2.vue';
import q3 from './Component/Charts/q3.vue';
import VueApexCharts from 'vue3-apexcharts'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head, Link, Pagination,
        Party, Equip, Talent, Stats, Conste,VueApexCharts, q1, q2, q3,
    },
    props:{
        builds: Object,
        characters: Object,
        artifactPcs: Object,
        weapons: Object,
    },
    data(){
        return {
            term: {
                    search: this.builds,
                },
        }
    },
     watch: {
            term: {
                deep: true,
                handler: throttle(function () {
                    this.$inertia.get(this.route('Dashboard'), pickBy(this.term), { preserveState: true })
                }, 150),
            },
        },
    methods: {
        update(id) {
            this.$inertia.put(route("updateBuildStatus", id));
        },
        destroy(id) {
            Swal.fire({
                title: "Are you sure ?",
                text: "You will not be able to recover this data !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Yes, delete it !",
                cancelButtonText: "No, cancel !",
                closeOnConfirm: false,
                closeOnCancel: false 
            }).then((result) => {
            if (result.value) {
                this.$inertia.delete(route("destroyDraft", id));
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                'Cancel',
                'Data has not been deleted ! ',
                'error'
                )
            }
            })
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
    }
}
</script>
