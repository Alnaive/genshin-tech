<template>
    <div v-for="build in builds" :key="build.id" class="flex flex-row card shadow-lg overflow-x-auto" >
        <ul id="landscapeData" class="flex flex-row space-x-4 rounded-xl max-h-[736px]" v-if="build.character.element == 'Fire' && showBuild == build.id" :style="{ backgroundImage: 'url(' + bgPyro() + ')', backgroundSize:'cover', backgroundRepeat: 'no-repeat'}">
            <li>
                <div id="potraitData" class="w-[414px] h-[736px] card " >
                <Link :href="route('showBuild', {id: build.id})">
                    <figure><img :src="showAvatar() + build.character.avatar" ></figure> 
                </Link>
                <div class="drop-shadow-lg shadow-black font-bold text-white absolute ml-4 top-0 mt-1">
                <pre data-prefix="$"><code>{{ build.character.name}}</code></pre> 
                <pre data-prefix=">" class="text-warning"><code>Level {{ build.level}}/{{( build.ascendsion * 10) + ( build.ascendsion>0?10:0) + 20}}</code></pre> 
                </div>
                   
                <section class="visible md:invisible">
                    <Equip :build="build"/>
                </section>
                <!-- constellation section -->
                <section> 
                <ul class="flex flex-col w-[70px]  bg-transparent absolute right-[-10px] top-12 ">
                    <li v-if="build.conste > 0" >
                        <div>
                            <div v-if="build.conste >= 1" class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderPyro() +')'}" >
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 1" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderPyro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 2" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderPyro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 3" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderPyro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 4" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderPyro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 5" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderPyro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li v-else>
                        <div v-for="cons in build.character.Consts" :key="cons" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                            <div class="hero-content text-center text-neutral-content">
                                <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${cons}.png`" alt="">
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <!-- endsection -->
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
            <li>
            <div class="space-y-1 mt-3 mr-2 text-white">
                <Weapon :build="build" />
                <Flower :build="build"/>
                <Plume :build="build"/>
                <Sands :build="build"/>
                <Goblet :build="build"/>
                <Circlet :build="build"/>
                <div  class="flex space-x-4 justify-center" >
                    <div class="flex-none ...">
                    <div class="flex flex-col">
                            <div  v-if="build.two_pcs_art">
                                <div v-for="data in build.two_pcs_art" :key="data" class="font-bold whitespace-nowrap text-md">
                                    {{data}}
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.one_pcs_art}}</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.four_pcs_art}}</div>
                            </div>
                    </div>
                    </div>
                    <div class="flex-none ...">
                        <div class="flex flex-col " >
                            <div  v-if="build.two_pcs_art">
                            <div v-for="data in build.two_pcs_art" :key="data" class="font-bold text-md">
                                <div class="font-bold text-md badge">2</div>
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold text-md badge mt-[12px]">3</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold text-md badge mt-[15px]">4</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
        </ul>
        <ul id="landscapeData" class="flex flex-row space-x-4 rounded-xl max-h-[736px]" v-else-if="build.character.element == 'Water' && showBuild == build.id" :style="{ backgroundImage: 'url(' + bgHydro() + ')', backgroundSize:'cover', backgroundRepeat: 'no-repeat'}">
            <li>
                <div id="potraitData" class="w-[414px] h-[736px] card " >
                <Link :href="route('showBuild', {id: build.id})">
                    <figure><img :src="showAvatar() + build.character.avatar" ></figure> 
                </Link>
                <div class="drop-shadow-lg shadow-black font-bold text-white absolute ml-4 top-0 mt-1">
                <pre data-prefix="$"><code>{{ build.character.name}}</code></pre> 
                <pre data-prefix=">" class="text-warning"><code>Level {{ build.level}}/{{( build.ascendsion * 10) + ( build.ascendsion>0?10:0) + 20}}</code></pre> 
                </div>
                   
                <section class="visible md:invisible">
                    <Equip :build="build"/>
                </section>
                <!-- constellation section -->
                <section> 
                <ul class="flex flex-col w-[70px]  bg-transparent absolute right-[-10px] top-12 ">
                    <li v-if="build.conste > 0" >
                        <div>
                            <div v-if="build.conste >= 1" class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderHydro() +')'}" >
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 1" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderHydro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 2" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderHydro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 3" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderHydro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 4" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderHydro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 5" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderHydro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li v-else>
                        <div v-for="cons in build.character.Consts" :key="cons" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                            <div class="hero-content text-center text-neutral-content">
                                <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${cons}.png`" alt="">
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <!-- endsection -->
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
            <li>
            <div class="space-y-1 mt-3 mr-2 text-white">
                <Weapon :build="build" />
                <Flower :build="build"/>
                <Plume :build="build"/>
                <Sands :build="build"/>
                <Goblet :build="build"/>
                <Circlet :build="build"/>
                <div  class="flex space-x-4 justify-center" >
                    <div class="flex-none ...">
                    <div class="flex flex-col">
                            <div  v-if="build.two_pcs_art">
                                <div v-for="data in build.two_pcs_art" :key="data" class="font-bold whitespace-nowrap text-md">
                                    {{data}}
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.one_pcs_art}}</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.four_pcs_art}}</div>
                            </div>
                    </div>
                    </div>
                    <div class="flex-none ...">
                        <div class="flex flex-col " >
                            <div  v-if="build.two_pcs_art">
                            <div v-for="data in build.two_pcs_art" :key="data" class="font-bold text-md">
                                <div class="font-bold text-md badge">2</div>
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold text-md badge mt-[12px]">3</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold text-md badge mt-[15px]">4</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
        </ul>
        <ul id="landscapeData" class="flex flex-row space-x-4 rounded-xl max-h-[736px]" v-else-if="build.character.element == 'Wind' && showBuild == build.id" :style="{ backgroundImage: 'url(' + bgAnemo() + ')', backgroundSize:'cover', backgroundRepeat: 'no-repeat'}">
            <li>
                <div id="potraitData" class="w-[414px] h-[736px] card " >
                <Link :href="route('showBuild', {id: build.id})">
                    <figure><img :src="showAvatar() + build.character.avatar" ></figure> 
                </Link>
                <div class="drop-shadow-lg shadow-black font-bold text-white absolute ml-4 top-0 mt-1">
                <pre data-prefix="$"><code>{{ build.character.name}}</code></pre> 
                <pre data-prefix=">" class="text-warning"><code>Level {{ build.level}}/{{( build.ascendsion * 10) + ( build.ascendsion>0?10:0) + 20}}</code></pre> 
                </div>
                   
                <section class="visible md:invisible">
                    <Equip :build="build"/>
                </section>
                <!-- constellation section -->
                <section> 
                <ul class="flex flex-col w-[70px]  bg-transparent absolute right-[-10px] top-12 ">
                    <li v-if="build.conste > 0" >
                        <div>
                            <div v-if="build.conste >= 1" class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderAnemo() +')'}" >
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 1" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderAnemo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 2" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderAnemo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 3" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderAnemo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 4" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderAnemo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 5" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderAnemo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li v-else>
                        <div v-for="cons in build.character.Consts" :key="cons" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                            <div class="hero-content text-center text-neutral-content">
                                <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${cons}.png`" alt="">
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <!-- endsection -->
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
            <li>
            <div class="space-y-1 mt-3 mr-2 text-white">
                <Weapon :build="build" />
                <Flower :build="build"/>
                <Plume :build="build"/>
                <Sands :build="build"/>
                <Goblet :build="build"/>
                <Circlet :build="build"/>
                <div  class="flex space-x-4 justify-center" >
                    <div class="flex-none ...">
                    <div class="flex flex-col">
                            <div  v-if="build.two_pcs_art">
                                <div v-for="data in build.two_pcs_art" :key="data" class="font-bold whitespace-nowrap text-md">
                                    {{data}}
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.one_pcs_art}}</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.four_pcs_art}}</div>
                            </div>
                    </div>
                    </div>
                    <div class="flex-none ...">
                        <div class="flex flex-col " >
                            <div  v-if="build.two_pcs_art">
                            <div v-for="data in build.two_pcs_art" :key="data" class="font-bold text-md">
                                <div class="font-bold text-md badge">2</div>
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold text-md badge mt-[12px]">3</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold text-md badge mt-[15px]">4</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
        </ul>
        <ul id="landscapeData" class="flex flex-row space-x-4 rounded-xl max-h-[736px]" v-else-if="build.character.element == 'Electric' && showBuild == build.id" :style="{ backgroundImage: 'url(' + bgElectro() + ')', backgroundSize:'cover', backgroundRepeat: 'no-repeat'}">
            <li>
                <div id="potraitData" class="w-[414px] h-[736px] card " >
                <Link :href="route('showBuild', {id: build.id})">
                    <figure><img :src="showAvatar() + build.character.avatar" ></figure> 
                </Link>
                <div class="drop-shadow-lg shadow-black font-bold text-white absolute ml-4 top-0 mt-1">
                <pre data-prefix="$"><code>{{ build.character.name}}</code></pre> 
                <pre data-prefix=">" class="text-warning"><code>Level {{ build.level}}/{{( build.ascendsion * 10) + ( build.ascendsion>0?10:0) + 20}}</code></pre> 
                </div>
                   
                <section class="visible md:invisible">
                    <Equip :build="build"/>
                </section>
                <!-- constellation section -->
                <section> 
                <ul class="flex flex-col w-[70px]  bg-transparent absolute right-[-10px] top-12 ">
                    <li v-if="build.conste > 0" >
                        <div>
                            <div v-if="build.conste >= 1" class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderElectro() +')'}" >
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 1" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderElectro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 2" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderElectro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 3" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderElectro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 4" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderElectro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 5" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderElectro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li v-else>
                        <div v-for="cons in build.character.Consts" :key="cons" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                            <div class="hero-content text-center text-neutral-content">
                                <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${cons}.png`" alt="">
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <!-- endsection -->
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
            <li>
            <div class="space-y-1 mt-3 mr-2 text-white">
                <Weapon :build="build" />
                <Flower :build="build"/>
                <Plume :build="build"/>
                <Sands :build="build"/>
                <Goblet :build="build"/>
                <Circlet :build="build"/>
                <div  class="flex space-x-4 justify-center" >
                    <div class="flex-none ...">
                    <div class="flex flex-col">
                            <div  v-if="build.two_pcs_art">
                                <div v-for="data in build.two_pcs_art" :key="data" class="font-bold whitespace-nowrap text-md">
                                    {{data}}
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.one_pcs_art}}</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.four_pcs_art}}</div>
                            </div>
                    </div>
                    </div>
                    <div class="flex-none ...">
                        <div class="flex flex-col " >
                            <div  v-if="build.two_pcs_art">
                            <div v-for="data in build.two_pcs_art" :key="data" class="font-bold text-md">
                                <div class="font-bold text-md badge">2</div>
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold text-md badge mt-[12px]">3</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold text-md badge mt-[15px]">4</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
        </ul>
        <ul id="landscapeData" class="flex flex-row space-x-4 rounded-xl max-h-[736px]" v-else-if="build.character.element == 'Rock' && showBuild == build.id" :style="{ backgroundImage: 'url(' + bgGeo() + ')', backgroundSize:'cover', backgroundRepeat: 'no-repeat'}">
            <li>
                <div id="potraitData" class="w-[414px] h-[736px] card " >
                <Link :href="route('showBuild', {id: build.id})">
                    <figure><img :src="showAvatar() + build.character.avatar" ></figure> 
                </Link>
                <div class="drop-shadow-lg shadow-black font-bold text-white absolute ml-4 top-0 mt-1">
                <pre data-prefix="$"><code>{{ build.character.name}}</code></pre> 
                <pre data-prefix=">" class="text-warning"><code>Level {{ build.level}}/{{( build.ascendsion * 10) + ( build.ascendsion>0?10:0) + 20}}</code></pre> 
                </div>
                   
                <section class="visible md:invisible">
                    <Equip :build="build"/>
                </section>
                <!-- constellation section -->
                <section> 
                <ul class="flex flex-col w-[70px]  bg-transparent absolute right-[-10px] top-12 ">
                    <li v-if="build.conste > 0" >
                        <div>
                            <div v-if="build.conste >= 1" class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderGeo() +')'}" >
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 1" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderGeo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 2" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderGeo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 3" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderGeo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 4" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderGeo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 5" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderGeo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li v-else>
                        <div v-for="cons in build.character.Consts" :key="cons" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                            <div class="hero-content text-center text-neutral-content">
                                <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${cons}.png`" alt="">
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <!-- endsection -->
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
            <li>
            <div class="space-y-1 mt-3 mr-2 text-white">
                <Weapon :build="build" />
                <Flower :build="build"/>
                <Plume :build="build"/>
                <Sands :build="build"/>
                <Goblet :build="build"/>
                <Circlet :build="build"/>
                <div  class="flex space-x-4 justify-center" >
                    <div class="flex-none ...">
                    <div class="flex flex-col">
                            <div  v-if="build.two_pcs_art">
                                <div v-for="data in build.two_pcs_art" :key="data" class="font-bold whitespace-nowrap text-md">
                                    {{data}}
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.one_pcs_art}}</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.four_pcs_art}}</div>
                            </div>
                    </div>
                    </div>
                    <div class="flex-none ...">
                        <div class="flex flex-col " >
                            <div  v-if="build.two_pcs_art">
                            <div v-for="data in build.two_pcs_art" :key="data" class="font-bold text-md">
                                <div class="font-bold text-md badge">2</div>
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold text-md badge mt-[12px]">3</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold text-md badge mt-[15px]">4</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
        </ul>
        <ul id="landscapeData" class="flex flex-row space-x-4 rounded-xl max-h-[736px]" v-else-if="build.character.element == 'Ice' && showBuild == build.id" :style="{ backgroundImage: 'url(' + bgCryo() + ')', backgroundSize:'cover', backgroundRepeat: 'no-repeat'}">
            <li>
                <div id="potraitData" class="w-[414px] h-[736px] card " >
                <Link :href="route('showBuild', {id: build.id})">
                    <figure><img :src="showAvatar() + build.character.avatar" ></figure> 
                </Link>
                <div class="drop-shadow-lg shadow-black font-bold text-white absolute ml-4 top-0 mt-1">
                <pre data-prefix="$"><code>{{ build.character.name}}</code></pre> 
                <pre data-prefix=">" class="text-warning"><code>Level {{ build.level}}/{{( build.ascendsion * 10) + ( build.ascendsion>0?10:0) + 20}}</code></pre> 
                </div>
                   
                <section class="visible md:invisible">
                    <Equip :build="build"/>
                </section>
                <!-- constellation section -->
                <section> 
                <ul class="flex flex-col w-[70px]  bg-transparent absolute right-[-10px] top-12 ">
                    <li v-if="build.conste > 0" >
                        <div>
                            <div v-if="build.conste >= 1" class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderCryo() +')'}" >
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 1" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderCryo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 2" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderCryo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 3" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderCryo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 4" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderCryo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 5" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderCryo() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li v-else>
                        <div v-for="cons in build.character.Consts" :key="cons" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                            <div class="hero-content text-center text-neutral-content">
                                <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${cons}.png`" alt="">
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <!-- endsection -->
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
            <li>
            <div class="space-y-1 mt-3 mr-2 text-white">
                <Weapon :build="build" />
                <Flower :build="build"/>
                <Plume :build="build"/>
                <Sands :build="build"/>
                <Goblet :build="build"/>
                <Circlet :build="build"/>
                <div  class="flex space-x-4 justify-center" >
                    <div class="flex-none ...">
                    <div class="flex flex-col">
                            <div  v-if="build.two_pcs_art">
                                <div v-for="data in build.two_pcs_art" :key="data" class="font-bold whitespace-nowrap text-md">
                                    {{data}}
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.one_pcs_art}}</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.four_pcs_art}}</div>
                            </div>
                    </div>
                    </div>
                    <div class="flex-none ...">
                        <div class="flex flex-col " >
                            <div  v-if="build.two_pcs_art">
                            <div v-for="data in build.two_pcs_art" :key="data" class="font-bold text-md">
                                <div class="font-bold text-md badge">2</div>
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold text-md badge mt-[12px]">3</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold text-md badge mt-[15px]">4</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
        </ul>
        <ul id="landscapeData" class="flex flex-row space-x-4 rounded-xl max-h-[736px]" v-else-if="build.character.element == 'Grass' && showBuild == build.id" :style="{ backgroundImage: 'url(' + bgDendro() + ')', backgroundSize:'cover', backgroundRepeat: 'no-repeat'}">
            <li>
                <div id="potraitData" class="w-[414px] h-[736px] card " >
                <Link :href="route('showBuild', {id: build.id})">
                    <figure><img :src="showAvatar() + build.character.avatar" ></figure> 
                </Link>
                <div class="drop-shadow-lg shadow-black font-bold text-white absolute ml-4 top-0 mt-1">
                <pre data-prefix="$"><code>{{ build.character.name}}</code></pre> 
                <pre data-prefix=">" class="text-warning"><code>Level {{ build.level}}/{{( build.ascendsion * 10) + ( build.ascendsion>0?10:0) + 20}}</code></pre> 
                </div>
                   
                <section class="visible md:invisible">
                    <Equip :build="build"/>
                </section>
                <!-- constellation section -->
                <section> 
                <ul class="flex flex-col w-[70px]  bg-transparent absolute right-[-10px] top-12 ">
                    <li v-if="build.conste > 0" >
                        <div>
                            <div v-if="build.conste >= 1" class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderDendro() +')'}" >
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[0]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 1" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderDendro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[1]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 2" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderDendro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[2]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 3" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderDendro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[3]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 4" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderDendro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[4]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div v-if="build.conste <= 5" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                            <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorderDendro() +')'}">
                                <div  class="hero-content text-center text-neutral-content">
                                    <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build.character.Consts[5]}.png`" alt="">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li v-else>
                        <div v-for="cons in build.character.Consts" :key="cons" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                            <div class="hero-content text-center text-neutral-content">
                                <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${cons}.png`" alt="">
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <!-- endsection -->
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
            <li>
            <div class="space-y-1 mt-3 mr-2 text-white">
                <Weapon :build="build" />
                <Flower :build="build"/>
                <Plume :build="build"/>
                <Sands :build="build"/>
                <Goblet :build="build"/>
                <Circlet :build="build"/>
                <div  class="flex space-x-4 justify-center" >
                    <div class="flex-none ...">
                    <div class="flex flex-col">
                            <div  v-if="build.two_pcs_art">
                                <div v-for="data in build.two_pcs_art" :key="data" class="font-bold whitespace-nowrap text-md">
                                    {{data}}
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.one_pcs_art}}</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.four_pcs_art}}</div>
                            </div>
                    </div>
                    </div>
                    <div class="flex-none ...">
                        <div class="flex flex-col " >
                            <div  v-if="build.two_pcs_art">
                            <div v-for="data in build.two_pcs_art" :key="data" class="font-bold text-md">
                                <div class="font-bold text-md badge">2</div>
                                </div>
                            </div>
                            <div v-if="build.one_pcs_art">
                                <div class="font-bold text-md badge mt-[12px]">3</div>
                            </div>
                            <div v-if="build.four_pcs_art">
                                <div class="font-bold text-md badge mt-[15px]">4</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
        </ul>
    </div>
</template>
<script>
import { Link, } from '@inertiajs/inertia-vue3';
import Stats from './Stats.vue';
import Equip from './Equip.vue';
import Talent from './Talent.vue';
import Weapon from './Weapon.vue';
import Flower from './Flower.vue';
import Plume from './Plume.vue';
import Sands from './Sands.vue';
import Goblet from './Goblet.vue';
import Circlet from './Circlet.vue';
export default{
    components:{
        Link, Stats, Equip, Talent, Weapon, Flower, Plume, Sands, Goblet, Circlet
    },
    props:['builds','showBuild'],
    methods:{
        showAvatar() {
            return "/storage/images/icon/avatar/";
        },
         bg5(){
            return "../../image/rarity/Background_Item_5_Star.png"
        },
        bg4(){
            return "../../image/rarity/Background_Item_4_Star.png"
        },
        bg3(){
            return "../../image/rarity/Background_Item_3_Star.png"
        },
        bg2(){
            return "../../image/rarity/Background_Item_2_Star.png"
        },
        bg1(){
            return "../../image/rarity/Background_Item_1_Star.png"
        },
        bgPyro(){
            return "../../image/element/bgPyro.jpg"
        },
        bgHydro(){
            return "../../image/element/bgHydro.jpg"
        },
        bgAnemo(){
            return "../../image/element/bgAnemo.jpg"
        },
        bgDendro(){
            return "../../image/element/bgDendro.jpg"
        },
        bgElectro(){
             return "../../image/element/bgElectro.jpg"
        },
        bgGeo(){
            return "../../image/element/bgGeo.jpg"
        },
        bgCryo(){
            return "../../image/element/bgCryo.jpg"
        },
        constBorderPyro(){
            return "../../image/svg/Const_Pyro.svg";
        },
        constBorderHydro(){
            return "../../image/svg/Const_Hydro.svg";
        },
        constBorderAnemo(){
            return "../../image/svg/Const_Anemo.svg";
        },
        constBorderElectro(){
            return "../../image/svg/Const_Electro.svg";
        },
        constBorderDendro(){
            return "../../image/svg/Const_Dendro.svg";
        },
        constBorderGeo(){
            return "../../image/svg/Const_Geo.svg";
        },
        constBorderCryo(){
            return "../../image/svg/Const_Cryo.svg";
        },
    }
}
</script>