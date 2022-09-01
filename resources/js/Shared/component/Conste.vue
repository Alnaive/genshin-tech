<template>
    <section> 
        <ul class="flex flex-col w-[70px]  bg-transparent absolute right-[-10px] top-12 ">
            <li  v-if="build[0].conste > 0">
                <div>
                    <div v-if="build[0].conste >= 1" class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorder() +')'}">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build[0].character.Consts[0]}.png`" alt="">
                        </div>
                    </div>
                    <div v-else class="hero w-14 h-14"  style="background-image: url('/image/svg/Const.svg');">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build[0].character.Consts[0]}.png`" alt="">
                        </div>
                    </div>
                </div>
                <div>
                    <div v-if="build[0].conste <= 1" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build[0].character.Consts[1]}.png`" alt="">
                        </div>
                    </div>
                    <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorder() +')'}">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build[0].character.Consts[1]}.png`" alt="">
                        </div>
                    </div>
                </div>
                <div>
                    <div v-if="build[0].conste <= 2" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build[0].character.Consts[2]}.png`" alt="">
                        </div>
                    </div>
                    <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorder() +')'}">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build[0].character.Consts[2]}.png`" alt="">
                        </div>
                    </div>
                </div>
                <div>
                    <div v-if="build[0].conste <= 3" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build[0].character.Consts[3]}.png`" alt="">
                        </div>
                    </div>
                    <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorder() +')'}">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build[0].character.Consts[3]}.png`" alt="">
                        </div>
                    </div>
                </div>
                <div>
                    <div v-if="build[0].conste <= 4" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build[0].character.Consts[4]}.png`" alt="">
                        </div>
                    </div>
                    <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorder() +')'}">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build[0].character.Consts[4]}.png`" alt="">
                        </div>
                    </div>
                </div>
                <div>
                    <div v-if="build[0].conste <= 5" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build[0].character.Consts[5]}.png`" alt="">
                        </div>
                    </div>
                    <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorder() +')'}">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${build[0].character.Consts[5]}.png`" alt="">
                        </div>
                    </div>
                </div>
            </li>
            <li v-else>
                <div v-for="cons in build[0].character.Consts" :key="cons" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                    <div class="hero-content text-center text-neutral-content">
                        <img :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/constellation_icon/${cons}.png`" alt="">
                    </div>
                </div>
            </li>
        </ul>
    </section>
</template>

<script>
export default {
    props: [ 'build'],
    methods:{
            constBorder(){
                const ele = this.build[0].character.element;
                if(ele == "Ice"){
                    return "../image/svg/Const_Cryo.svg";
                } else if(ele == "Rock"){
                    return "../image/svg/Const_Geo.svg";
                } else if(ele == "Dendro"){
                    return "../image/svg/Const_Dendro.svg";
                } else if(ele == "Wind"){
                    return "../image/svg/Const_Anemo.svg";
                } else if(ele == "Electric"){
                    return "../image/svg/Const_Electro.svg";
                } else if(ele == "Water"){
                    return "../image/svg/Const_Hydro.svg";
                } else if(ele == "Fire"){
                    return "../image/svg/Const_Pyro.svg";
                }
            },
    }
}
</script>