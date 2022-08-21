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
        <div class="flex  flex-col space-y-5">
            <div v-for="build in allBuilds" :key="build.id" class="card bg-white shadow-xl dark:bg-base-100">
                <div class="flex flex-col">
                    <div class="card ">
                        <div id="potraitData" class="w-[368px] md:w-[399px] h-[400px] card " >
                            <Link :href="route('showBuild', { id: build.id })">
                            <figure>
                                <img :src="showAvatar() + build.character.avatar" >
                            </figure> 
                            </Link>
                            <div class="drop-shadow-lg shadow-black font-bold text-white absolute ml-4 top-0 mt-1">
                            <h1 class="text-lg font-bold">{{build.nickname}}</h1>
                            <pre class="text-warning">Level {{ build.level}}/{{( build.ascendsion * 10) + ( build.ascendsion>0?10:0) + 20}}</pre>
                            <div class="flex items-center">
                                <VueFeather type="heart" size="18" stroke="red" fill="red" class="mr-1"></VueFeather>{{build.likes_count}} 
                            </div>
                            </div>
                                <Equip :build="build" />
                            <Conste :build="build" />
                            <Talent :build="build" /> 
                        </div>
                    </div>
                </div>
                    <div class="btn-group">
                        <label :for="`my-modal-4${build.id}`" class="btn w-full btn-ghost ">Stats</label>
                    </div>
                <!-- Put this part before </body> tag -->
                <input type="checkbox" :id="`my-modal-4${build.id}`" class="modal-toggle" />
                <label :for="`my-modal-4${build.id}`" class="modal cursor-pointer">
                <label class="modal-box relative " for="">
                    <h3 class="text-lg font-bold flex justify-center">{{build.character.name}}</h3>
                <div class="flex justify-center ">
                <div class="">
                    <h1>Basic Stats</h1>
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
                  <div class="divider divider-horizontal"></div>
                <div class="">
                    <h1>Advance Stats</h1>
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
                </label>
                </label>
            </div>
            <span ref="loadMoreIntersect"/> 
        </div>
    </Guest>
</template>
<script>
import { Link, } from '@inertiajs/inertia-vue3';
import Guest from '@/Layouts/Guest.vue';
import VueFeather from 'vue-feather';
import Talent from '@/Shared/component/exploreTalent.vue';
import Equip from './Builds/Component/Equip.vue';
import Conste from './Builds/Component/Conste.vue';

export default{
    components:{
        Link,  Guest, VueFeather,  Talent, Equip, Conste
    },
    props:{
        builds: Object,
    },
    data(){
        return{
            uid: null,
            allBuilds: this.builds.data,
            initialUrl: this.$page.url,
        }
    },
    methods:{
        searchUID(uid){
            this.$inertia.get(`/showcase/${uid}`, {}, { preserveScroll: true });
        },
         showAvatar() {
                return "/storage/images/icon/avatar/";
            }, 
       loadMorePosts() {
        if (this.builds.next_page_url === null) {
            return
        }
    
        this.$inertia.get(this.builds.next_page_url, {}, {
            preserveState: true,
            preserveScroll: true,
            only: ['builds'],
            onSuccess: () => {
            this.allBuilds = [...this.allBuilds, ...this.builds.data]                      
            window.history.replaceState({}, this.$page.title, this.initialUrl) 
            }
        })
        }
    },
    mounted(){
    const observer = new IntersectionObserver(entries => entries.forEach(entry => entry.isIntersecting && this.loadMorePosts(), {
      rootMargin: "-150px 0px 0px 0px"
    }));
    observer.observe(this.$refs.loadMoreIntersect);
  } 
}

</script>
