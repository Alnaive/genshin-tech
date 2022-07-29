<template>
    <div v-for="weapon in weapons" :key="weapon.id" class="avatar absolute left-2 top-20 indicator">
        <div v-if="weapon.id == build.weapon_id && weapon.rarity == '5'"  class="mb-8 rounded-btn w-12 h-12 " 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" v-on:click =" $emit('update:weaponDetail')">
            <div class="indicator-item avatar">
                <div v-if="weapon.id == build.weapon_id && weapon.rarity == '5'"  class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                    {{build.refinement}}
                </div>
            </div> 
            <img  :src="awakenIcon()" >
        </div>
         <div v-else-if="weapon.id == build.weapon_id && weapon.rarity == '4'"  class="mb-8 rounded-btn w-12 h-12 " 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="weapon.id == build.weapon_id && weapon.rarity == '4'"  class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    {{build.refinement}}
                </div>
            </div> 
            <img :src="awakenIcon()" >
        </div>
         <div v-else-if="weapon.id == build.weapon_id && weapon.rarity == '3'"  class="mb-8 rounded-btn w-12 h-12 " 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="weapon.id == build.weapon_id && weapon.rarity == '3'"  class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                    {{build.refinement}}
                </div>
            </div> 
            <img :src="awakenIcon()" >
        </div>
         <div v-else-if="weapon.id == build.weapon_id && weapon.rarity == '2'"  class="mb-8 rounded-btn w-12 h-12 " 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="weapon.id == build.weapon_id && weapon.rarity == '2'"  class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                    {{build.refinement}}
                </div>
            </div> 
            <img :src="awakenIcon()" >
        </div>
         <div v-else-if="weapon.id == build.weapon_id && weapon.rarity == '1'"  class="mb-8 rounded-btn w-12 h-12 " 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="weapon.id == build.weapon_id && weapon.rarity == '1'"  class="text-center rounded-btn w-6 h-6 font-bold" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                    {{build.refinement}}
                </div>
            </div> 
            <img :src="awakenIcon()" >
        </div>
    </div>
    <div v-for="artifact in artifactPcs" :key="artifact.id" class="avatar absolute left-2 top-36">
        <div v-if="build.flower_id == null" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
        </div>
        <div v-else-if="artifact.id == build.flower_id && artifact.rarity == '5'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.flower_id && artifact.rarity == '4'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.flower_id && artifact.rarity == '3'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.flower_id && artifact.rarity == '2'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.flower_id && artifact.rarity == '1'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
    </div>
    <div v-for="artifact in artifactPcs" :key="artifact.id"  class="avatar absolute left-2 top-52">
            <div v-if="build.plume_id == null" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
        </div>
        <div v-else-if="artifact.id == build.plume_id && artifact.rarity == '5'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.plume_id && artifact.rarity == '4'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.plume_id && artifact.rarity == '3'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.plume_id && artifact.rarity == '2'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.plume_id && artifact.rarity == '1'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
    </div>
    <div v-for="artifact in artifactPcs" :key="artifact.id" class="avatar absolute left-16 top-28 indicator">
            <div v-if="build.sand_id == null" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
        </div>
        <div v-else-if="artifact.id == build.sand_id && artifact.rarity == '5'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
         <div class="indicator-item avatar">
                <div v-if="artifact.id == build.sand_id && artifact.rarity == '5'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_sand == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_sand == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_sand == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_sand == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_sand == 'Energy Recharge'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.sand_id && artifact.rarity == '4'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
         <div class="indicator-item avatar">
                <div v-if="artifact.id == build.sand_id && artifact.rarity == '4'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_sand == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_sand == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_sand == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_sand == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_sand == 'Energy Recharge'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">    
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.sand_id && artifact.rarity == '3'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
         <div class="indicator-item avatar">
                <div v-if="artifact.id == build.sand_id && artifact.rarity == '3'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_sand == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_sand == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_sand == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_sand == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_sand == 'Energy Recharge'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">    
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.sand_id && artifact.rarity == '2'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
         <div class="indicator-item avatar">
                <div v-if="artifact.id == build.sand_id && artifact.rarity == '2'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_sand == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_sand == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_sand == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_sand == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_sand == 'Energy Recharge'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">    
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.sand_id && artifact.rarity == '1'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == build.sand_id && artifact.rarity == '1'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_sand == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_sand == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_sand == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_sand == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_sand == 'Energy Recharge'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">    
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
    </div>
    <div v-for="artifact in artifactPcs" :key="artifact.id" class="avatar absolute left-16 top-44 indicator">
        <div v-if="build.goblet_id == null" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
        </div>
        <div v-else-if="artifact.id == build.goblet_id && artifact.rarity == '5'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == build.goblet_id && artifact.rarity == '5'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_goblet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_goblet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_goblet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_goblet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_goblet == 'Physical DMG Bonus'" src="/image/attribute/Icon_Attribute_Physical2.png">
                    <img v-else-if="build.main_goblet == 'Anemo DMG Bonus'" src="/image/attribute/Anemo.png">
                    <img v-else-if="build.main_goblet == 'Pyro DMG Bonus'" src="/image/attribute/Pyro.png">
                    <img v-else-if="build.main_goblet == 'Hydro DMG Bonus'" src="/image/attribute/Hydro.png">
                    <img v-else-if="build.main_goblet == 'Electro DMG Bonus'" src="/image/attribute/Electro.png">
                    <img v-else-if="build.main_goblet == 'Dendro DMG Bonus'" src="/image/attribute/Dendro.png">
                    <img v-else-if="build.main_goblet == 'Cryo DMG Bonus'" src="/image/attribute/Cryo.png">
                    <img v-else-if="build.main_goblet == 'Geo DMG Bonus'" src="/image/attribute/Geo.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
         <div v-else-if="artifact.id == build.goblet_id && artifact.rarity == '4'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == build.goblet_id && artifact.rarity == '4'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_goblet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_goblet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_goblet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_goblet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_goblet == 'Physical DMG Bonus'" src="/image/attribute/Icon_Attribute_Physical2.png">
                    <img v-else-if="build.main_goblet == 'Anemo DMG Bonus'" src="/image/attribute/Anemo.png">
                    <img v-else-if="build.main_goblet == 'Pyro DMG Bonus'" src="/image/attribute/Pyro.png">
                    <img v-else-if="build.main_goblet == 'Hydro DMG Bonus'" src="/image/attribute/Hydro.png">
                    <img v-else-if="build.main_goblet == 'Electro DMG Bonus'" src="/image/attribute/Electro.png">
                    <img v-else-if="build.main_goblet == 'Dendro DMG Bonus'" src="/image/attribute/Dendro.png">
                    <img v-else-if="build.main_goblet == 'Cryo DMG Bonus'" src="/image/attribute/Cryo.png">
                    <img v-else-if="build.main_goblet == 'Geo DMG Bonus'" src="/image/attribute/Geo.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
         <div v-else-if="artifact.id == build.goblet_id && artifact.rarity == '3'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == build.goblet_id && artifact.rarity == '3'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_goblet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_goblet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_goblet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_goblet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_goblet == 'Physical DMG Bonus'" src="/image/attribute/Icon_Attribute_Physical2.png">
                    <img v-else-if="build.main_goblet == 'Anemo DMG Bonus'" src="/image/attribute/Anemo.png">
                    <img v-else-if="build.main_goblet == 'Pyro DMG Bonus'" src="/image/attribute/Pyro.png">
                    <img v-else-if="build.main_goblet == 'Hydro DMG Bonus'" src="/image/attribute/Hydro.png">
                    <img v-else-if="build.main_goblet == 'Electro DMG Bonus'" src="/image/attribute/Electro.png">
                    <img v-else-if="build.main_goblet == 'Dendro DMG Bonus'" src="/image/attribute/Dendro.png">
                    <img v-else-if="build.main_goblet == 'Cryo DMG Bonus'" src="/image/attribute/Cryo.png">
                    <img v-else-if="build.main_goblet == 'Geo DMG Bonus'" src="/image/attribute/Geo.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
         <div v-else-if="artifact.id == build.goblet_id && artifact.rarity == '2'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == build.goblet_id && artifact.rarity == '2'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_goblet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_goblet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_goblet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_goblet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_goblet == 'Physical DMG Bonus'" src="/image/attribute/Icon_Attribute_Physical2.png">
                    <img v-else-if="build.main_goblet == 'Anemo DMG Bonus'" src="/image/attribute/Anemo.png">
                    <img v-else-if="build.main_goblet == 'Pyro DMG Bonus'" src="/image/attribute/Pyro.png">
                    <img v-else-if="build.main_goblet == 'Hydro DMG Bonus'" src="/image/attribute/Hydro.png">
                    <img v-else-if="build.main_goblet == 'Electro DMG Bonus'" src="/image/attribute/Electro.png">
                    <img v-else-if="build.main_goblet == 'Dendro DMG Bonus'" src="/image/attribute/Dendro.png">
                    <img v-else-if="build.main_goblet == 'Cryo DMG Bonus'" src="/image/attribute/Cryo.png">
                    <img v-else-if="build.main_goblet == 'Geo DMG Bonus'" src="/image/attribute/Geo.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
         <div v-else-if="artifact.id == build.goblet_id && artifact.rarity == '1'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == build.goblet_id && artifact.rarity == '1'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_goblet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_goblet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_goblet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_goblet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_goblet == 'Physical DMG Bonus'" src="/image/attribute/Icon_Attribute_Physical2.png">
                    <img v-else-if="build.main_goblet == 'Anemo DMG Bonus'" src="/image/attribute/Anemo.png">
                    <img v-else-if="build.main_goblet == 'Pyro DMG Bonus'" src="/image/attribute/Pyro.png">
                    <img v-else-if="build.main_goblet == 'Hydro DMG Bonus'" src="/image/attribute/Hydro.png">
                    <img v-else-if="build.main_goblet == 'Electro DMG Bonus'" src="/image/attribute/Electro.png">
                    <img v-else-if="build.main_goblet == 'Dendro DMG Bonus'" src="/image/attribute/Dendro.png">
                    <img v-else-if="build.main_goblet == 'Cryo DMG Bonus'" src="/image/attribute/Cryo.png">
                    <img v-else-if="build.main_goblet == 'Geo DMG Bonus'" src="/image/attribute/Geo.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
    </div>
    <div v-for="artifact in artifactPcs" :key="artifact.id" class="avatar absolute left-16 top-60 indicator">
        <div v-if="build.circlet_id == null" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
        </div>
        <div v-else-if="artifact.id == build.circlet_id && artifact.rarity == '5'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == build.circlet_id && artifact.rarity == '5'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_circlet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_circlet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_circlet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_circlet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_circlet == 'CRIT Rate'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="build.main_circlet == 'CRIT DMG'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="build.main_circlet == 'Healing Bonus'" src="/image/attribute/Icon_Attribute_Healing.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.circlet_id && artifact.rarity == '4'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == build.circlet_id && artifact.rarity == '4'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_circlet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_circlet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_circlet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_circlet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_circlet == 'CRIT Rate'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="build.main_circlet == 'CRIT DMG'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="build.main_circlet == 'Healing Bonus'" src="/image/attribute/Icon_Attribute_Healing.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.circlet_id && artifact.rarity == '3'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == build.circlet_id && artifact.rarity == '3'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_circlet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_circlet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_circlet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_circlet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_circlet == 'CRIT Rate'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="build.main_circlet == 'CRIT DMG'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="build.main_circlet == 'Healing Bonus'" src="/image/attribute/Icon_Attribute_Healing.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.circlet_id && artifact.rarity == '2'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == build.circlet_id && artifact.rarity == '2'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_circlet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_circlet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_circlet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_circlet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_circlet == 'CRIT Rate'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="build.main_circlet == 'CRIT DMG'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="build.main_circlet == 'Healing Bonus'" src="/image/attribute/Icon_Attribute_Healing.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == build.circlet_id && artifact.rarity == '1'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == build.circlet_id && artifact.rarity == '1'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                    <img v-if="build.main_circlet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="build.main_circlet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="build.main_circlet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="build.main_circlet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="build.main_circlet == 'CRIT Rate'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="build.main_circlet == 'CRIT DMG'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="build.main_circlet == 'Healing Bonus'" src="/image/attribute/Icon_Attribute_Healing.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
    </div>
</template>
<script>
export default {
    props:['build','artifactPcs','weapons'],
    methods: {
        awakenIcon(){
            const src = this.build.weapon.awakenicon;
            const url = "https://res.cloudinary.com/genshin/image/upload/sprites/"+src+".png"
            return url;
        },
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