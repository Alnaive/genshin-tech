<template>
<!-- <Equip :uid="uid" ></Equip> -->
    <div class="avatar absolute left-2 top-20">
        <div v-if="build[0].equipList[5].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" >
            <img v-if="build[0].equipList[5].weapon.promoteLevel > 1" 
            :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[5].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" >
            <img v-if="build[0].equipList[5].weapon.promoteLevel > 1" 
            :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[5].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }" >
            <img v-if="build[0].equipList[5].weapon.promoteLevel > 1" 
            :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[5].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }" >
            <img v-if="build[0].equipList[5].weapon.promoteLevel > 1" 
            :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[5].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }" >
            <img v-if="build[0].equipList[5].weapon.promoteLevel > 1" 
            :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}.png`">
        </div>
    </div>
    <div  class="avatar absolute left-2 top-36">
        <div v-if="build[0].equipList[0].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[0].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[0].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[0].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[0].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[0].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[0].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[0].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[0].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[0].flat.icon}.png`">
        </div>
    </div>
    <div  class="avatar absolute left-2 top-52">
        <div v-if="build[0].equipList[1].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[1].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[1].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[1].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[1].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[1].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[1].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[1].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[1].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[1].flat.icon}.png`">
        </div>
    </div>
    <div class="avatar absolute left-16 top-28 ">
        <div v-if="build[0].equipList[2].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[2].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[2].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[2].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[2].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[2].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[2].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[2].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[2].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[2].flat.icon}.png`">
        </div>
    </div>
    <div class="avatar absolute left-16 top-44 ">
        <div v-if="build[0].equipList[3].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[3].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[3].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[3].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[3].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[3].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[3].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[3].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[3].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[3].flat.icon}.png`">
        </div>
    </div>
    <div :key="index" class="avatar absolute left-16 top-60 ">
        <div v-if="build[0].equipList[4].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[4].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[4].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[4].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[4].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[4].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[4].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[4].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[4].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[4].flat.icon}.png`">
        </div>
    </div> 
    <!-- end of equip -->
</template>
<script>
export default {
    props:['build'],
    methods: {
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
    },
}
</script>