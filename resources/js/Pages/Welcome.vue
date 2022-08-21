<template>
    <Guest>
        <div class="flex flex-col md:flex-row container mx-auto px-4 space-x-4 space-y-4 mt-5">
            <div class="space-y-4 mr-4 md:mt-[250px]">
                <h1 class="font-bold text-xl ">Create a Card and Store Your Build</h1>
                <p class="text-md">Fetch data from your Character Showcase and display a build card or store it, instantly.</p>
                <form @submit.prevent="searchUID(uid)">
                    <div class="flex flex-row space-x-4">
                        <input v-model="uid" type="text" placeholder="UID" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        <button class="btn btn-primary">Search</button>
                    </div>
                    <pre class="mt-3 normal-case">Powered by Enka.Network</pre>
                </form>
            </div>
            <div class="">
                <div  class="flex flex-row card shadow-lg overflow-x-auto" :style="{ backgroundImage: 'url(' + bgElement() + ')', backgroundSize:'cover', backgroundRepeat: 'no-repeat'}">
                    <ul id="landscapeData" class="flex flex-row space-x-4 rounded-xl">
                        <li>
                            <Link :href="route('showBuild', { id: build[0].id })">
                                <div id="potraitData" class="w-[414px] h-[736px] card " >
                                    <figure>
                                        <img :src="showAvatar() + build[0].character.avatar" >
                                    </figure> 
                                    <div class="drop-shadow-lg shadow-black font-bold text-white absolute ml-4 top-0 mt-1">
                                    <h1>{{ build[0].character.name}}</h1> 
                                    <pre >By {{ build[0].nickname}}</pre> 
                                    <pre class="text-warning">Level {{ build[0].level}}/{{( build[0].ascendsion * 10) + ( build[0].ascendsion>0?10:0) + 20}}</pre> 
                                    </div>
                                    <section class="visible md:invisible">
                                        <Equip :build="build" />
                                    </section>
                                    <Conste :build="build" />
                                    <Talent :build="build" /> 
                                    <div class="card absolute inset-x-0 bottom-0 mt-5">
                                        <div class="bg-transparent" >
                                            <section class="px-2 py-2 text-white" >
                                                <Stats :build="build" />
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </Link>
                        </li>
                        <li>
                    <div class="space-y-1 mt-3 mr-2 text-white">
                        <Weapon :build="build" />
                        <Flower :build="build"/>
                        <Plume :build="build"/>
                        <Sands :build="build"/>
                        <Goblet :build="build"/>
                        <Circlet :build="build"/>
                        <div  class="flex space-x-3 justify-center" >
                        <div class="flex-none ...">
                        <div class="flex flex-col">
                                <div  v-if="build[0].two_pcs_art">
                                    <div v-for="data in build[0].two_pcs_art" :key="data" class="font-bold whitespace-nowrap text-md">
                                        {{data}}
                                    </div>
                                </div>
                                <div v-if="build[0].one_pcs_art">
                                    <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build[0].one_pcs_art}}</div>
                                </div>
                                <div v-if="build[0].four_pcs_art">
                                    <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build[0].four_pcs_art}}</div>
                                </div>
                        </div>
                        </div>
                        <div class="flex-none ...">
                            <div class="flex flex-col " >
                                <div  v-if="build[0].two_pcs_art">
                                 <div v-for="data in build[0].two_pcs_art" :key="data" class="font-bold text-md">
                                    <div class="font-bold text-md badge">2</div>
                                    </div>
                                </div>
                                <div v-if="build[0].one_pcs_art">
                                    <div class="font-bold text-md badge mt-[12px]">3</div>
                                </div>
                                <div v-if="build[0].four_pcs_art">
                                    <div class="font-bold text-md badge mt-[15px]">4</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
            <div class="container px-5 py-12 mx-auto">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-center  mb-20">What website is this?
                </h1>
                <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
                <div class="p-4 md:w-1/3 flex">
                    <div class="flex-grow pl-6">
                    <h2 class=" text-lg title-font font-medium mb-2">Fan made</h2>
                    <p class="leading-relaxed text-base">
                        This site is not affiliated with miHoYo & All game content and assets are trademarks and copyrights of miHoYo.
                    </p>
                    </div>
                </div>
                <div class="p-4 md:w-1/3 flex">
                    <div class="flex-grow pl-6">
                    <h2 class=" text-lg title-font font-medium mb-2">Goal</h2>
                    <p class="leading-relaxed text-base">
                        Showcase your builds to help other players and provide you reference builds from other players, also giving you a character card.
                    </p>
                    </div>
                </div>
                <div class="p-4 md:w-1/3 flex">
                    <div class="flex-grow pl-6">
                    <h2 class=" text-lg title-font font-medium mb-2">Data Collection</h2>
                    <p class="leading-relaxed text-base">
                        The data is used to make statistical about a character for helping players to building their character with a reference on this site.
                    </p>
                    </div>
                </div>
                </div>
            </div>
           
  <div class="container px-5 py-12 mx-auto flex flex-wrap">
    <div class=" mb-10 lg:mb-0 rounded-lg overflow-hidden">
      <div  class="flex flex-row card shadow-lg overflow-x-auto" >
        <ul id="landscapeData" class="flex flex-row space-x-4 rounded-xl" :style="{ backgroundImage: 'url(' + bgElement() + ')', backgroundSize:'cover', backgroundRepeat: 'no-repeat'}">
            <li>
                <div id="potraitData" class="w-[414px] h-[736px] card " >
                <figure>
                    <img :src="showAvatar() + build[0].character.avatar" >
                </figure> 
                <div class="drop-shadow-lg shadow-black font-bold text-white absolute ml-4 top-0 mt-1">
                <pre data-prefix="$"><code>{{ build[0].character.name}}</code></pre> 
                <pre data-prefix=">" class="text-warning"><code>Level {{ build[0].level}}/{{( build[0].ascendsion * 10) + ( build[0].ascendsion>0?10:0) + 20}}</code></pre> 
                </div>
                <Equip :build="build" />
                <Conste :build="build" />
                <Talent :build="build" /> 
                <div class="card absolute inset-x-0 bottom-0 mt-5">
                    <div class="bg-transparent" >
                        <section class="px-2 py-2 text-white" >
                            <Stats :build="build" />
                        </section>
                    </div>
                    </div>
                </div>
            </li>
        </ul>
      </div>
    </div>
    <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
      <div class="flex flex-col mb-10 lg:items-start items-center">
        <div class="flex-grow">
          <h2 class=" text-lg title-font font-medium mb-3">Is it safe?</h2>
          <p class="leading-relaxed text-base">
             This site never asks about credentials account info such as email and password.
          </p>
        </div>
      </div>
      <div class="flex flex-col mb-10 lg:items-start items-center">
        <div class="flex-grow">
          <h2 class=" text-lg title-font font-medium mb-3">But</h2>
          <p class="leading-relaxed text-base">
            How can this site gain the information from my account?
            Well thanks to EnkaNetwork API for fetch data by uid.
          </p>
          <a href="https://enka.network" target="_BLANK" class="mt-3 text-indigo-500 inline-flex items-center">Learn More
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
      <div class="flex flex-col mb-10 lg:items-start items-center">
        <div class="flex-grow">
          <h2 class=" text-lg title-font font-medium mb-3">Important</h2>
          <p class="leading-relaxed text-base">
            By storing your build on this site, your UID will be stored.
          </p>
        </div>
      </div>
    </div>
  </div>
    </Guest>
</template>

<script>
import { Head, Link, useForm, useRemember } from '@inertiajs/inertia-vue3';
import Guest from '@/Layouts/Guest.vue';
import VueFeather from 'vue-feather';
import Equip from '@/Shared/component/Equip.vue';
import Conste from '@/Shared/component/Conste.vue';
import Talent from '@/Shared/component/Talent.vue';
import Stats from '@/Shared/component/Stats.vue';
import Weapon from '@/Shared/component/Weapon.vue';
import Flower from '@/Shared/component/Flower.vue';
import Plume from '@/Shared/component/Plume.vue';
import Sands from '@/Shared/component/Sands.vue';
import Goblet from '@/Shared/component/Goblet.vue';
import Circlet from '@/Shared/component/Circlet.vue';

export default {
    components: {
      Head,
      Link,
      Guest, VueFeather, Equip, Conste, Talent, Stats, Weapon, Flower, Plume, Sands, Goblet, Circlet,
    },
    props: {
        build: Object,
        totalBuild: Number,
    },
    data(){
        return {
            uid: null,
        }
    },
    methods: {
         searchUID(uid){
            this.$inertia.get(`/u/${uid}`, {}, { preserveScroll: true });
        },
        showAvatar() {
                return "/storage/images/icon/avatar/";
            }, 
        bgElement(){
            const ele = this.build[0].character.element;
                if(ele == "Ice"){
                    return "../image/element/bgCryo.jpg"
                } else if(ele == "Rock"){
                    return "../image/element/bgGeo.jpg"
                } else if(ele == "Dendro"){
                    return "../image/element/bgDendro.jpg"
                } else if(ele == "Wind"){
                    return "../image/element/bgAnemo.jpg"
                } else if(ele == "Electric"){
                    return "../image/element/bgElectro.jpg"
                } else if(ele == "Water"){
                    return "../image/element/bgHydro.jpg"
                } else if(ele == "Fire"){
                    return "../image/element/bgPyro.jpg"
                }
            },
    }
  
    
}


</script>
