<template>
<!-- <Equip :uid="uid" ></Equip> -->
    <div class="avatar absolute left-2 top-20 indicator">
        <div v-if="build[0].equipList[5].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" >
            <div class="indicator-item avatar">
                <div class="text-center rounded-btn w-6 h-6 font-bold text-white" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                    <span v-if="Object.values(build[0].equipList[5].weapon.affixMap) == 0">1</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 1">2</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 2">3</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 3">4</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 4">5</span>
                </div>
            </div> 
            <img v-if="build[0].equipList[5].weapon.promoteLevel > 1" 
            :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[5].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" >
            <div class="indicator-item avatar">
                <div class="text-center rounded-btn w-6 h-6 font-bold text-white" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    <span v-if="Object.values(build[0].equipList[5].weapon.affixMap) == 0">1</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 1">2</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 2">3</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 3">4</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 4">5</span>
                </div>
            </div> 
            <img v-if="build[0].equipList[5].weapon.promoteLevel > 1" 
            :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[5].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }" >
            <div class="indicator-item avatar">
                <div class="text-center rounded-btn w-6 h-6 font-bold text-white" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                    <span v-if="Object.values(build[0].equipList[5].weapon.affixMap) == 0">1</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 1">2</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 2">3</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 3">4</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 4">5</span>
                </div>
            </div> 
            <img v-if="build[0].equipList[5].weapon.promoteLevel > 1" 
            :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[5].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }" >
            <div class="indicator-item avatar">
                <div class="text-center rounded-btn w-6 h-6 font-bold text-white" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                    <span v-if="Object.values(build[0].equipList[5].weapon.affixMap) == 0">1</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 1">2</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 2">3</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 3">4</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 4">5</span>
                </div>
            </div> 
            <img v-if="build[0].equipList[5].weapon.promoteLevel > 1" 
            :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}_Awaken.png`">
            <img v-else :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[5].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[5].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }" >
            <div class="indicator-item avatar">
                <div class="text-center rounded-btn w-6 h-6 font-bold text-white" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                    <span v-if="Object.values(build[0].equipList[5].weapon.affixMap) == 0">1</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 1">2</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 2">3</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 3">4</span>
                    <span v-else-if="Object.values(build[0].equipList[5].weapon.affixMap) == 4">5</span>
                </div>
            </div> 
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
    <div class="avatar absolute left-16 top-28 indicator">
        <div v-if="build[0].equipList[2].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[2].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[2].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[2].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[2].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[2].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[2].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[2].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[2].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[2].flat.icon}.png`">
        </div>
    </div>
    <div class="avatar absolute left-16 top-44 indicator">
        <div v-if="build[0].equipList[3].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_PHYSICAL_ADD_HURT'" src="/image/svg/FIGHT_PROP_PHYSICAL_ADD_HURT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WIND_ADD_HURT'" src="/image/attribute/Anemo.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_FIRE_ADD_HURT'" src="/image/attribute/Pyro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WATER_ADD_HURT'" src="/image/attribute/Hydro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEC_ADD_HURT'" src="/image/attribute/Electro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ICE_ADD_HURT'" src="/image/attribute/Cryo.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ROCK_ADD_HURT'" src="/image/attribute/Geo.png" >
                    <img v-else src="/image/attribute/Dendro.png" >                   
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[3].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[3].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_PHYSICAL_ADD_HURT'" src="/image/svg/FIGHT_PROP_PHYSICAL_ADD_HURT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WIND_ADD_HURT'" src="/image/attribute/Anemo.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_FIRE_ADD_HURT'" src="/image/attribute/Pyro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WATER_ADD_HURT'" src="/image/attribute/Hydro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEC_ADD_HURT'" src="/image/attribute/Electro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ICE_ADD_HURT'" src="/image/attribute/Cryo.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ROCK_ADD_HURT'" src="/image/attribute/Geo.png" >
                    <img v-else src="/image/attribute/Dendro.png" >                   
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[3].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[3].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_PHYSICAL_ADD_HURT'" src="/image/svg/FIGHT_PROP_PHYSICAL_ADD_HURT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WIND_ADD_HURT'" src="/image/attribute/Anemo.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_FIRE_ADD_HURT'" src="/image/attribute/Pyro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WATER_ADD_HURT'" src="/image/attribute/Hydro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEC_ADD_HURT'" src="/image/attribute/Electro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ICE_ADD_HURT'" src="/image/attribute/Cryo.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ROCK_ADD_HURT'" src="/image/attribute/Geo.png" >
                    <img v-else src="/image/attribute/Dendro.png" >                   
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[3].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[3].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_PHYSICAL_ADD_HURT'" src="/image/svg/FIGHT_PROP_PHYSICAL_ADD_HURT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WIND_ADD_HURT'" src="/image/attribute/Anemo.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_FIRE_ADD_HURT'" src="/image/attribute/Pyro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WATER_ADD_HURT'" src="/image/attribute/Hydro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEC_ADD_HURT'" src="/image/attribute/Electro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ICE_ADD_HURT'" src="/image/attribute/Cryo.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ROCK_ADD_HURT'" src="/image/attribute/Geo.png" >
                    <img v-else src="/image/attribute/Dendro.png" >                   
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[3].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[3].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_PHYSICAL_ADD_HURT'" src="/image/svg/FIGHT_PROP_PHYSICAL_ADD_HURT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WIND_ADD_HURT'" src="/image/attribute/Anemo.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_FIRE_ADD_HURT'" src="/image/attribute/Pyro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WATER_ADD_HURT'" src="/image/attribute/Hydro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEC_ADD_HURT'" src="/image/attribute/Electro.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ICE_ADD_HURT'" src="/image/attribute/Cryo.png" >
                    <img v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ROCK_ADD_HURT'" src="/image/attribute/Geo.png" >
                    <img v-else src="/image/attribute/Dendro.png" >                   
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[3].flat.icon}.png`">
        </div>
    </div>
    <div :key="index" class="avatar absolute left-16 top-60 indicator">
        <div v-if="build[0].equipList[4].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CRITICAL'" src="/image/svg/FIGHT_PROP_CRITICAL.svg" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CRITICAL_HURT'" src="/image/attribute/Icon_Attribute_Critical_Damage.png" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HEAL_ADD'" src="/image/attribute/Icon_Attribute_Healing.png" >
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[4].flat.icon}.png`">
        </div>
            <div v-else-if="build[0].equipList[4].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CRITICAL'" src="/image/svg/FIGHT_PROP_CRITICAL.svg" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CRITICAL_HURT'" src="/image/attribute/Icon_Attribute_Critical_Damage.png" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HEAL_ADD'" src="/image/attribute/Icon_Attribute_Healing.png" >
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[4].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[4].flat.rankLevel == 3" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CRITICAL'" src="/image/svg/FIGHT_PROP_CRITICAL.svg" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CRITICAL_HURT'" src="/image/attribute/Icon_Attribute_Critical_Damage.png" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HEAL_ADD'" src="/image/attribute/Icon_Attribute_Healing.png" >
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[4].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[4].flat.rankLevel == 2" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CRITICAL'" src="/image/svg/FIGHT_PROP_CRITICAL.svg" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CRITICAL_HURT'" src="/image/attribute/Icon_Attribute_Critical_Damage.png" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HEAL_ADD'" src="/image/attribute/Icon_Attribute_Healing.png" >
                </div>
            </div>
            <img  :src=" `https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[4].flat.icon}.png`">
        </div>
        <div v-else-if="build[0].equipList[4].flat.rankLevel == 1" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar" >
                <div class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                    <img v-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/svg/FIGHT_PROP_DEFENSE_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" class="ml-[3px] mt-[4px]" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CRITICAL'" src="/image/svg/FIGHT_PROP_CRITICAL.svg" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CRITICAL_HURT'" src="/image/attribute/Icon_Attribute_Critical_Damage.png" >
                    <img v-else-if="build[0].equipList[4].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HEAL_ADD'" src="/image/attribute/Icon_Attribute_Healing.png" >
                </div>
            </div>
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