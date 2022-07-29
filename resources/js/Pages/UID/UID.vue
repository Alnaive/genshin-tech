<template>
    <Head>
        <title>Character</title>
    </Head>
        <Guest>
            <template #header>
            <div class="flex">
                <div class="alert alert-info shadow-lg" >
                   {{uid.playerInfo.nickname}}
                    <div v-if="!uid.avatarInfoList">no data found, please add character in-game profile</div>
                </div>
            </div>
            </template>
            <div class="avatar" v-for="data in character" :key="data">
                <div class="w-24" v-if="uid.playerInfo.profilePicture.avatarId == data.id">
                    <img :src="data.icon">
                </div>
            </div>
            <div class="flex justify-center overflow-x-auto">
            <tabs v-model="active">
                <tab  v-for="index in uid.avatarInfoList" :key="index">
                <div v-for="data in character" :key="data">
                    <div class="avatar" v-if="data.id == index.avatarId">
                        <div class="w-24 rounded-full">
                            <img :src="data.icon" alt="">
                        </div>
                    </div>
                </div>
                
                </tab>
            </tabs>
            </div>
            <tab-panels v-model="active" >
                <!-- <Anemo :uid="uid"></Anemo> -->
                <tab-panel v-for="data in uid.avatarInfoList" :key="data" >
        <div class="flex justify-center space-x-2 " v-for="char in character" :key="char.id" >
            <div v-if="data.avatarId == char.id" class="artboard phone-3 artboard-demo card shadow-xl image-full bg-dark-eval-2 
             transform hover:scale-105 duration-500 ease-in-out" >
             <Link :href="route('AddBuild', { id: UID })" @click="addBuild(data)" v-on:click="addCharacter(char)">
            <figure >
                    <img :src="showAvatar() + char.avatar" >
                </figure> 
                <div class="">
                    <h3 class="text-center text-black dark:text-white font-bold text-lg absolute left-[11px] top-0 mt-5">{{char.name}}  Lv {{data.propMap[4001]['val']}}
                    </h3>
                    <!-- <Equip :uid="uid" ></Equip> -->
                    <div v-for="(weaponItem, index) in Object.keys(data.equipList).splice(5,5)" :key="index" class="avatar absolute left-2 top-20 indicator">
                        <div v-if="data.equipList[weaponItem].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" >
                            <div class="indicator-item avatar">
                                <div   class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <span v-if="Object.values(data.equipList[weaponItem].weapon.affixMap) == 0">1</span>
                                    <span v-else-if="Object.values(data.equipList[weaponItem].weapon.affixMap) == 1">2</span>
                                    <span v-else-if="Object.values(data.equipList[weaponItem].weapon.affixMap) == 2">3</span>
                                    <span v-else-if="Object.values(data.equipList[weaponItem].weapon.affixMap) == 3">4</span>
                                    <span v-else-if="Object.values(data.equipList[weaponItem].weapon.affixMap) == 4">5</span>
                                </div>
                            </div> 
                            <img  :src=" `https://enka.shinshin.moe/ui/${data.equipList[weaponItem].flat.icon}.png`">
                        </div>
                        <div v-if="data.equipList[weaponItem].flat.rankLevel == 4" class="mb-8 rounded-btn w-12 h-12 " :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" >
                            <div class="indicator-item avatar">
                                <div   class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                                    <span v-if="Object.values(data.equipList[weaponItem].weapon.affixMap) == 0">1</span>
                                    <span v-else-if="Object.values(data.equipList[weaponItem].weapon.affixMap) == 1">2</span>
                                    <span v-else-if="Object.values(data.equipList[weaponItem].weapon.affixMap) == 2">3</span>
                                    <span v-else-if="Object.values(data.equipList[weaponItem].weapon.affixMap) == 3">4</span>
                                    <span v-else-if="Object.values(data.equipList[weaponItem].weapon.affixMap) == 4">5</span>
                                </div>
                            </div> 
                            <img  :src=" `https://enka.shinshin.moe/ui/${data.equipList[weaponItem].flat.icon}.png`">
                        </div>
                    </div>
                    <div v-for="(flower, index) in Object.keys(data.equipList).splice(0,1)" :key="index" class="avatar absolute left-2 top-36">
                        <div v-if="data.equipList[flower].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" 
                        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://enka.shinshin.moe/ui/${data.equipList[flower].flat.icon}.png`">
                        </div>
                    </div>
                    <div v-for="(plume, index) in Object.keys(data.equipList).splice(1,1)" :key="index" class="avatar absolute left-2 top-52">
                        <div v-if="data.equipList[plume].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" 
                        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                            <img  :src=" `https://enka.shinshin.moe/ui/${data.equipList[plume].flat.icon}.png`">
                        </div>
                    </div>
                    <div v-for="(sand, index) in Object.keys(data.equipList).splice(1,2)" :key="index" class="avatar absolute left-16 top-28 indicator">
                        <div v-if="data.equipList[sand].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                            <div class="indicator-item avatar" >
                                <div class="text-center rounded-btn w-6 h-6 font-bold" >
                                    <img v-if="data.equipList[sand].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/svg/FIGHT_PROP_ATTACK_PERCENT.svg" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[sand].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/attribute/Icon_Attribute_Defense.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[sand].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/svg/FIGHT_PROP_HP_PERCENT.svg" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[sand].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[sand].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                </div>
                            </div>
                            <img  :src=" `https://enka.shinshin.moe/ui/${data.equipList[sand].flat.icon}.png`">
                        </div>
                    </div>
                    <div v-for="(goblet, index) in Object.keys(data.equipList).splice(2,2)" :key="index" class="avatar absolute left-16 top-44 indicator">
                        <div v-if="data.equipList[goblet].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                            <div class="indicator-item avatar" >
                                <div class="text-center rounded-btn w-6 h-6 font-bold" >
                                    <img v-if="data.equipList[goblet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/attribute/Icon_Attribute_Attack.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[goblet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/attribute/Icon_Attribute_Defense.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[goblet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/attribute/Icon_Attribute_Health.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[goblet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[goblet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_PHYSICAL_ADD_HURT'" src="/image/attribute/Icon_Attribute_Physical2.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[goblet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WIND_ADD_HURT'" src="/image/attribute/Anemo.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[goblet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_FIRE_ADD_HURT'" src="/image/attribute/Pyro.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[goblet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WATER_ADD_HURT'" src="/image/attribute/Hydro.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[goblet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEC_ADD_HURT'" src="/image/attribute/Electro.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[goblet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ICE_ADD_HURT'" src="/image/attribute/Cryo.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[goblet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ROCK_ADD_HURT'" src="/image/attribute/Geo.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else src="/image/attribute/Dendro.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">                   
                                </div>
                            </div>
                            <img  :src=" `https://enka.shinshin.moe/ui/${data.equipList[goblet].flat.icon}.png`">
                        </div>
                    </div>
                    <div v-for="(circlet, index) in Object.keys(data.equipList).splice(2,3)" :key="index" class="avatar absolute left-16 top-60 indicator">
                        <div v-if="data.equipList[circlet].flat.rankLevel == 5" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                            <div class="indicator-item avatar" >
                                <div class="text-center rounded-btn w-6 h-6 font-bold" >
                                    
                                    <img v-if="data.equipList[circlet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'" src="/image/attribute/Icon_Attribute_Attack.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[circlet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" src="/image/attribute/Icon_Attribute_Defense.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[circlet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" src="/image/attribute/Icon_Attribute_Health.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[circlet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[circlet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CRITICAL'" src="/image/attribute/Icon_Attribute_Critical_Damage.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[circlet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CRITICAL_HURT'" src="/image/attribute/Icon_Attribute_Critical_Damage.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                    <img v-else-if="data.equipList[circlet].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HEAL_ADD'" src="/image/attribute/Icon_Attribute_Healing.png" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                                </div>
                            </div>
                            <img  :src=" `https://enka.shinshin.moe/ui/${data.equipList[circlet].flat.icon}.png`">
                        </div>
                    </div>
                    <!-- end of equip -->
                    <!-- <Party :uid="uid" />  -->
                    <div  class="space-x-2 absolute left-[10px] top-[50%]">
                        <div v-if="!data.proudSkillExtraLevelMap"  class="flex flex-row space-x-4">
                            <div v-for="(skillLv, skillKey) in data.skillLevelMap" :key="skillKey">
                                <div v-for="(icon, iconKey) in char.Skills" :key="iconKey" class="avatar indicator "> 
                                    <div v-if="skillKey == iconKey"  class="indicator-item ">
                                        <span class="ml-[10px] text-center text-md font-bold text-black dark:text-white">{{skillLv}}</span> 
                                    </div>
                                    <div v-if="iconKey == skillKey" class=" rounded-full w-10 h-10 ring ring-base-content">
                                        <img  :src=" `https://enka.shinshin.moe/ui/${icon}.png`">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="Object.keys(data.proudSkillExtraLevelMap).length == 1" >
                                <div v-for="conS in Object.keys(data.proudSkillExtraLevelMap)" :key="conS">
                                    <div v-for="(proudVal, proudKey) in char.ProudMap" :key="proudVal">
                                        <div v-if="proudVal == conS" class="flex flex-row space-x-4">
                                        <div v-for="(skillLv, skillKey) in data.skillLevelMap" :key="skillKey" >
                                            <div v-for="(icon, iconKey) in char.Skills" :key="iconKey" class="avatar indicator "> 
                                                <div v-if="skillKey == iconKey"  class="indicator-item ">
                                                    <span v-if="skillKey == proudKey" class="ml-[10px] text-center text-md font-bold text-blue-500">
                                                    {{skillLv + data.proudSkillExtraLevelMap[conS]}}
                                                    </span>
                                                    <span v-else class="ml-[10px] text-center text-md font-bold text-black dark:text-white">{{skillLv}}</span> 
                                                </div>
                                                <div v-if="iconKey == skillKey" class=" rounded-full w-10 h-10 ring ring-base-content">
                                                    <img  :src=" `https://enka.shinshin.moe/ui/${icon}.png`">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="Object.keys(data.proudSkillExtraLevelMap).length == 2" >
                            <div v-for="conT in Object.keys(data.proudSkillExtraLevelMap).splice(0,1)" :key="conT">
                                <div v-for="conS in Object.keys(data.proudSkillExtraLevelMap).splice(1,1)" :key="conS">
                                    <div v-for="(proudVal, proudKey) in char.ProudMap" :key="proudVal">
                                        <div v-if="proudVal == conT && conS" class="flex flex-row space-x-4">
                                            <div v-for="(skillLv, skillKey) in data.skillLevelMap" :key="skillKey">
                                                <div v-for="(icon, iconKey) in char.Skills" :key="iconKey" class="avatar indicator"> 
                                                        <div v-if="skillKey == iconKey && skillKey == char.SkillOrder[0]"  class="indicator-item ">
                                                        <span v-if="proudVal != 3331" class="ml-[10px] text-center text-md font-bold ">{{skillLv}}</span>
                                                        <span v-else class="ml-[10px] text-center text-md font-bold text-blue-500">{{skillLv + data.proudSkillExtraLevelMap[conT]}}</span> 
                                                        </div>
                                                        <div v-if="skillKey == iconKey && skillKey == char.SkillOrder[1]"  class="indicator-item ">
                                                        <span  class="ml-[10px] text-center text-md font-bold text-blue-500">{{skillLv + data.proudSkillExtraLevelMap[conS]}}</span> 
                                                        </div>
                                                        <div v-if="skillKey == iconKey && skillKey == char.SkillOrder[2]"  class="indicator-item ">
                                                        <span v-if="skillKey == 10333" class="ml-[10px] text-center text-md font-bold">{{skillLv}}</span>
                                                        <span v-else class="ml-[10px] text-center text-md font-bold text-blue-500">{{skillLv + data.proudSkillExtraLevelMap[conS]}}</span> 
                                                        </div>
                                                    <div v-if="iconKey == skillKey" class=" rounded-full w-10 h-10 ring ring-base-content">
                                                        <img :src=" `https://enka.shinshin.moe/ui/${icon}.png`">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="Object.keys(data.proudSkillExtraLevelMap).length == 3" >
                            <div v-for="nT in Object.keys(data.proudSkillExtraLevelMap).splice(0,1)" :key="nT">
                                <div v-for="conT in Object.keys(data.proudSkillExtraLevelMap).splice(1,1)" :key="conT">
                                    <div v-for="conS in Object.keys(data.proudSkillExtraLevelMap).splice(2,2)" :key="conS">
                                    <div v-for="proudVal in char.ProudMap" :key="proudVal">
                                        <div v-if="proudVal == nT && conT && conS" class="flex flex-row space-x-4">
                                        <div v-for="(skillLv, skillKey) in data.skillLevelMap" :key="skillKey">
                                            
                                                <div v-for="(icon, iconKey) in char.Skills" :key="iconKey" class="avatar indicator"> 
                                                <div class="indicator-item" v-if="skillKey == iconKey">
                                                <span  v-if="skillKey == char.SkillOrder[0] ">{{skillLv + data.proudSkillExtraLevelMap[nT]}}</span>
                                                <span v-if="skillKey == char.SkillOrder[1] ">{{skillLv + data.proudSkillExtraLevelMap[conT]}}</span>
                                                <span v-if="skillKey == char.SkillOrder[2]">{{skillLv + data.proudSkillExtraLevelMap[conS]}}</span>
                                                </div>
                                                <div v-if="iconKey == skillKey" class=" rounded-full w-10 h-10 ring ring-base-content">
                                                    <img :src=" `https://enka.shinshin.moe/ui/${icon}.png`">
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <Conste :uid="uid" /> -->
                    <section> 
                    <ul  class="flex flex-col w-12 py-1  bg-transparent  absolute right-4 top-16 space-y-1" >
                        <li v-if="data.talentIdList">
                            <div class="avatar">
                                <div v-if="data.talentIdList.length == 1" class=" rounded-full w-10 h-10 ring ring-base-content  bg-black opacity-50">
                                    <img :src=" `https://enka.shinshin.moe/ui/${char.Consts[0]}.png`">
                                </div>
                                <div v-else class=" rounded-full w-10 h-10 ring ring-base-content  bg-black">
                                    <img :src=" `https://enka.shinshin.moe/ui/${char.Consts[0]}.png`">
                                </div>
                            </div>
                            <div class="avatar">
                                <div v-if="data.talentIdList.length <= 1" class=" rounded-full w-10 h-10 ring ring-base-content  bg-black opacity-50">
                                    <img :src=" `https://enka.shinshin.moe/ui/${char.Consts[1]}.png`">
                                </div>
                                <div v-else class=" rounded-full w-10 h-10 ring ring-base-content  bg-black">
                                    <img :src=" `https://enka.shinshin.moe/ui/${char.Consts[1]}.png`">
                                </div>
                            </div>
                            <div class="avatar">
                                <div v-if="data.talentIdList.length <= 2" class=" rounded-full w-10 h-10 ring ring-base-content  bg-black opacity-50">
                                    <img :src=" `https://enka.shinshin.moe/ui/${char.Consts[2]}.png`">
                                </div>
                                <div v-else class=" rounded-full w-10 h-10 ring ring-base-content  bg-black">
                                    <img :src=" `https://enka.shinshin.moe/ui/${char.Consts[2]}.png`">
                                </div>
                            </div>
                            <div class="avatar">
                                <div v-if="data.talentIdList.length <= 3" class=" rounded-full w-10 h-10 ring ring-base-content  bg-black opacity-50">
                                    <img :src=" `https://enka.shinshin.moe/ui/${char.Consts[3]}.png`">
                                </div>
                                <div v-else class=" rounded-full w-10 h-10 ring ring-base-content  bg-black">
                                    <img :src=" `https://enka.shinshin.moe/ui/${char.Consts[3]}.png`">
                                </div>
                            </div>
                            <div class="avatar">
                                <div v-if="data.talentIdList.length <= 4" class=" rounded-full w-10 h-10 ring ring-base-content  bg-black opacity-50">
                                    <img :src=" `https://enka.shinshin.moe/ui/${char.Consts[4]}.png`">
                                </div>
                                <div v-else class=" rounded-full w-10 h-10 ring ring-base-content  bg-black">
                                    <img :src=" `https://enka.shinshin.moe/ui/${char.Consts[4]}.png`">
                                </div>
                            </div>
                            <div class="avatar">
                                <div v-if="data.talentIdList.length <= 5" class=" rounded-full w-10 h-10 ring ring-base-content  bg-black opacity-50">
                                    <img :src=" `https://enka.shinshin.moe/ui/${char.Consts[5]}.png`">
                                </div>
                                <div v-else class=" rounded-full w-10 h-10 ring ring-base-content  bg-black">
                                    <img :src=" `https://enka.shinshin.moe/ui/${char.Consts[5]}.png`">
                                </div>
                            </div>
                            <div v-if="data.talentIdList.length == 1" class=" absolute right-5">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:-222px; margin-left:10px">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:26px; margin-left:10px">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:27px; margin-left:10px">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:26px; margin-left:10px">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:25px; margin-left:10px">
                            </div>
                            <div v-else-if="data.talentIdList.length == 2" class=" absolute right-5">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:26px; margin-left:10px">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:27px; margin-left:10px">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:26px; margin-left:10px">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:25px; margin-left:10px">
                            </div>
                            <div v-else-if="data.talentIdList.length == 3" class=" absolute right-5">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:-130px; margin-left:10px">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:26px; margin-left:10px">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:25px; margin-left:10px">
                            </div>
                            <div v-else-if="data.talentIdList.length == 4" class=" absolute right-5">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:26px; margin-left:10px">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:25px; margin-left:10px">
                            </div>
                            <div v-else-if="data.talentIdList.length == 5" class=" absolute right-5">
                                <img  :src="lock()" style="width:20px; height:20px; margin-top:-38px; margin-left:10px">
                            </div>
                        </li>
                        <li v-else>
                                <div class="avatar" v-for="cons in char.Consts" :key="cons">
                                <div  class=" rounded-full w-10 h-10 ring ring-base-content  bg-black" :style="{ backgroundImage: 'url(' +  `https://enka.shinshin.moe/ui/${cons}.png` + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                                </div>
                            </div>
                        </li>
                    </ul>
                    </section>
                    <!-- <Talent :uid="uid" />  -->
                    
                </div>
                <div class="card absolute inset-x-0 bottom-0 mt-5">
                    <div class="bg-transparent" >
                        <section class="px-2 py-2 text-white" >
                            <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Health.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Max Hp</strong>
                                    <strong class="mr-2 "> <span >{{ data.fightPropMap[2000].toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
                                    </strong>
                                </div> 
                                <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Attack.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Attack</strong>
                                    <strong class="mr-2 "> <span >{{ data.fightPropMap[2001].toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Defense.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Defense</strong>
                                    <strong class="mr-2 "> <span >{{ data.fightPropMap[2002].toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Elemental Mastery</strong>
                                    <strong class="mr-2 "> <span >{{ data.fightPropMap[28].toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
                                    </strong>
                                </div>
                                <div class="divider"></div>
                                <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Critical_Hit.png" class="w-[23px] h-[21px] ml-[8px]">
                                    <strong class="flex-1 w-64 ">Critical Rate</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[20] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                    <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Critical_Damage.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Critical Damage</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[22] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Energy_Recharge.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Energy Recharge</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[23] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="char.Element == 'Water' && data.fightPropMap[42] > 0">
                                    <img src="/image/attribute/Hydro.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Hydro DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[42] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="char.Element == 'Wind' && data.fightPropMap[44] > 0">
                                    <img src="/image/attribute/Anemo.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Anemo DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[44] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div> 
                                <div class="flex items-center gap-2" v-if="char.Element == 'Fire' && data.fightPropMap[40] > 0">
                                    <img src="/image/attribute/Pyro.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Pyro DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[40] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="char.Element == 'Ice' && data.fightPropMap[46] > 0">
                                    <img src="/image/attribute/Cryo.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Cryo DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[46] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="char.Element == 'Electric' && data.fightPropMap[41] > 0">
                                    <img src="/image/attribute/Electro.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Electro DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[41] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="char.Element == 'Rock' && data.fightPropMap[45] > 0">
                                    <img src="/image/attribute/Geo.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Geo DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[45] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="data.fightPropMap[30] > 0">
                                    <img src="/image/attribute/Icon_Attribute_Physical2.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Physical DMG Bonus</strong>
                                    <strong class="mr-2 "> <span >{{ parseFloat(data.fightPropMap[30] * 100).toFixed(1) }}%</span> <br>
                                    </strong>
                                </div>
                        </section>
                    </div>
                </div>
            </Link>
        </div>
        </div>
        </tab-panel>
            </tab-panels>
        </Guest>
        {{loop}}
        {{group}}
</template>

<script>
import { Head, Link, useForm, useRemember } from '@inertiajs/inertia-vue3';
import Navbar from '@/Shared/Navbar';
import Guest from '@/Layouts/Guest.vue'
import VueFeather from 'vue-feather';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import Tabs from '@/Shared/Tabs';
import Tab from '@/Shared/Tab';
import TabPanels from '@/Shared/TabPanels';
import TabPanel from '@/Shared/TabPanel';
import { ref } from "vue";
import Party from './/Component/Party.vue'
import Equip from './Component/Equip.vue';
import Talent from './Component/Talent.vue';
import Stats from './Component/Stats.vue';
import Conste from './Component/Conste.vue';
import Anemo from './Component/Anemo.vue';
import { EncryptStorage } from 'encrypt-storage';
// export const encryptStorage = new EncryptStorage(process.env.SECRET_KEY, options);
export default {
    components: {
      Head,
      Link,
      Navbar,
      Guest, VueFeather, vSelect, Tab, Tabs, TabPanel, TabPanels,
      Party, Equip, Talent, Stats, Conste, Anemo

     
    },
    props: {
        uid: Object,
        UID: Object,
        character: Object,
        itemName: Object,
    },
    setup(props){
        const i = useForm({
            hp: null,
            atk: null,
        });
        const active = ref(0);

        return{i, active}
    },
    methods: {
        addBuild(data){
            const i = data;
            const encryptStorage = new EncryptStorage(process.env.MIX_SECRET_KEY, {
                 storageType: 'sessionStorage',
            });
            const encryptStorage1 = new EncryptStorage(process.env.MIX_SECRET_KEY, {
                 storageType: 'sessionStorage',
            });
            encryptStorage.setItem('sessionData', JSON.stringify(i));
            encryptStorage1.setItem('playerInfo', JSON.stringify(this.uid.playerInfo));
        },
        addCharacter(char){
             const encryptStorage = new EncryptStorage(process.env.MIX_SECRET_KEY, {
                 storageType: 'sessionStorage',
            });
            encryptStorage.setItem('charData', JSON.stringify(char));
        },
        bgElement(){
                const i = this.character.forEach((item) => {
                    this.cek = item;
                })
                const ele = this.cek;
                if(ele == "Cryo"){
                    return "/image/element/bgCryo.jpg"
                } else if(ele == "Geo"){
                    return "/image/element/bgGeo.jpg"
                } else if(ele == "Dendro"){
                    return "/image/element/bgDendro.jpg"
                } else if(ele == "Wind"){
                    return "/image/element/bgAnemo.jpg"
                } else if(ele == "Electro"){
                    return "/image/element/bgElectro.jpg"
                } else if(ele == "Hydro"){
                    return "/image/element/bgHydro.jpg"
                } else if(ele == "Pyro"){
                    return "/image/element/bgPyro.jpg"
                }
            },
        showAvatar() {
            return "/storage/images/icon/avatar/";
        },
        lock(){
                return "../image/attribute/lock.png"
            },
            bg5(){
                return "../../image/rarity/Background_Item_5_Star.png"
            },
            bg4(){
                return "../../image/rarity/Background_Item_4_Star.png"
            },
    },
   
}

</script>
<style>
    .rounded-br-3xl{
        color: white;
    }
</style>