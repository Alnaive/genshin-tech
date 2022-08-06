<template>
<!-- <Equip :uid="uid" ></Equip> -->
    <div v-for="(weaponItem, index) in Object.keys(sessionData.equipList).splice(5,5)" :key="index" class="avatar absolute left-2 top-20 ">
        <div v-if="sessionData.equipList[weaponItem].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" >
            <img v-if="Object.values(sessionData.equipList[weaponItem].weapon.promoteLevel > 1)" 
            :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${sessionData.equipList[weaponItem].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${sessionData.equipList[weaponItem].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[weaponItem].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" >
            <img v-if="Object.values(sessionData.equipList[weaponItem].weapon.promoteLevel > 1)"  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${sessionData.equipList[weaponItem].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${sessionData.equipList[weaponItem].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[weaponItem].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }" >
            <img v-if="Object.values(sessionData.equipList[weaponItem].weapon.promoteLevel > 1)"  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${sessionData.equipList[weaponItem].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${sessionData.equipList[weaponItem].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[weaponItem].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }" >
            <img v-if="Object.values(sessionData.equipList[weaponItem].weapon.promoteLevel > 1)"  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${sessionData.equipList[weaponItem].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${sessionData.equipList[weaponItem].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[weaponItem].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }" >
            <img v-if="Object.values(sessionData.equipList[weaponItem].weapon.promoteLevel > 1)"  :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${sessionData.equipList[weaponItem].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${sessionData.equipList[weaponItem].flat.icon}.png`">
        </div>
    </div>
    <div v-for="(flower, index) in Object.keys(sessionData.equipList).splice(0,1)" :key="index" class="avatar absolute left-2 top-36">
        <div v-if="sessionData.equipList[flower].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[flower].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[flower].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[flower].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[flower].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[flower].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[flower].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[flower].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[flower].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[flower].flat.icon}.png`">
        </div>
    </div>
    <div v-for="(plume, index) in Object.keys(sessionData.equipList).splice(1,1)" :key="index" class="avatar absolute left-2 top-52">
        <div v-if="sessionData.equipList[plume].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[plume].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[plume].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[plume].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[plume].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[plume].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[plume].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[plume].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[plume].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[plume].flat.icon}.png`">
        </div>
    </div>
    <div v-for="(sand, index) in Object.keys(sessionData.equipList).splice(1,2)" :key="index" class="avatar absolute left-16 top-28 ">
        <div v-if="sessionData.equipList[sand].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[sand].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[sand].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[sand].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[sand].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[sand].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[sand].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[sand].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[sand].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[sand].flat.icon}.png`">
        </div>
    </div>
    <div v-for="(goblet, index) in Object.keys(sessionData.equipList).splice(2,2)" :key="index" class="avatar absolute left-16 top-44 ">
        <div v-if="sessionData.equipList[goblet].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[goblet].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[goblet].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[goblet].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[goblet].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[goblet].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[goblet].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[goblet].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[goblet].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[goblet].flat.icon}.png`">
        </div>
    </div>
    <div v-for="(circlet, index) in Object.keys(sessionData.equipList).splice(2,3)" :key="index" class="avatar absolute left-16 top-60 ">
        <div v-if="sessionData.equipList[circlet].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[circlet].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[circlet].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[circlet].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[circlet].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[circlet].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[circlet].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[circlet].flat.icon}.png`">
        </div>
        <div v-else-if="sessionData.equipList[circlet].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[circlet].flat.icon}.png`">
        </div>
    </div>
    <!-- end of equip -->
</template>
<script>
export default {
    props:['sessionData'],
    methods: {
            bgRarity(){
                return "../../image/rarity/Background_Item_5_Star.png"
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
    },
}
</script>