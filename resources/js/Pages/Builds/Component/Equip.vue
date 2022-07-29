<template>
    <div v-for="weapon in weapons" :key="weapon.id" class="avatar absolute left-2 top-20 indicator">
        <div v-if="weapon_id == null" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
        </div>
        <div v-else-if="weapon.id == weapon_id && weapon.rarity == '5'" @change="$emit('update:weapon_id', $event.target.value)"  class="mb-8 rounded-btn w-12 h-12 " 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="weapon.id == weapon_id && weapon.rarity == '5'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                    {{refinement}}
                </div>
            </div> 
            <img :src="weapon.icon" >
        </div>
         <div v-else-if="weapon.id == weapon_id && weapon.rarity == '4'" @change="$emit('update:weapon_id', $event.target.value)"  class="mb-8 rounded-btn w-12 h-12 " 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="weapon.id == weapon_id && weapon.rarity == '4'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    {{refinement}}
                </div>
            </div> 
            <img :src="weapon.icon" >
        </div>
         <div v-else-if="weapon.id == weapon_id && weapon.rarity == '3'" @change="$emit('update:weapon_id', $event.target.value)"  class="mb-8 rounded-btn w-12 h-12 " 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="weapon.id == weapon_id && weapon.rarity == '3'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                    {{refinement}}
                </div>
            </div> 
            <img :src="weapon.icon" >
        </div>
         <div v-else-if="weapon.id == weapon_id && weapon.rarity == '2'" @change="$emit('update:weapon_id', $event.target.value)"  class="mb-8 rounded-btn w-12 h-12 " 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="weapon.id == weapon_id && weapon.rarity == '2'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                    {{refinement}}
                </div>
            </div> 
            <img :src="weapon.icon" >
        </div>
         <div v-else-if="weapon.id == weapon_id && weapon.rarity == '1'" @change="$emit('update:weapon_id', $event.target.value)"  class="mb-8 rounded-btn w-12 h-12 " 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="weapon.id == weapon_id && weapon.rarity == '1'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                    {{refinement}}
                </div>
            </div> 
            <img :src="weapon.icon" >
        </div>
    </div>
    <div v-for="artifact in artPcs" :key="artifact.id" class="avatar absolute left-2 top-36">
        <div v-if="flower_id == null" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
        </div>
        <div v-else-if="artifact.id == flower_id && artifact.rarity == '5'" @change="$emit('update:flower_id', $event.target.value)" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == flower_id && artifact.rarity == '4'" @change="$emit('update:flower_id', $event.target.value)" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == flower_id && artifact.rarity == '3'" @change="$emit('update:flower_id', $event.target.value)" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == flower_id && artifact.rarity == '2'" @change="$emit('update:flower_id', $event.target.value)" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == flower_id && artifact.rarity == '1'" @change="$emit('update:flower_id', $event.target.value)" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
    </div>
    <div v-for="artifact in artPcs" :key="artifact.id"  class="avatar absolute left-2 top-52">
            <div v-if="plume_id == null" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
        </div>
        <div v-else-if="artifact.id == plume_id && artifact.rarity == '5'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == plume_id && artifact.rarity == '4'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == plume_id && artifact.rarity == '3'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == plume_id && artifact.rarity == '2'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == plume_id && artifact.rarity == '1'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <img :src="artifact.icon" >
        </div>
    </div>
    <div v-for="artifact in artPcs" :key="artifact.id" class="avatar absolute left-16 top-28 indicator">
            <div v-if="sand_id == null" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
        </div>
        <div v-else-if="artifact.id == sand_id && artifact.rarity == '5'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
         <div class="indicator-item avatar">
                <div v-if="artifact.id == sand_id && artifact.rarity == '5'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                    <img v-if="main_sand == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_sand == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_sand == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_sand == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_sand == 'Energy Recharge'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">    
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == sand_id && artifact.rarity == '4'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
         <div class="indicator-item avatar">
                <div v-if="artifact.id == sand_id && artifact.rarity == '4'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    <img v-if="main_sand == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_sand == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_sand == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_sand == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_sand == 'Energy Recharge'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">    
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == sand_id && artifact.rarity == '3'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
         <div class="indicator-item avatar">
                <div v-if="artifact.id == sand_id && artifact.rarity == '3'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                    <img v-if="main_sand == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_sand == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_sand == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_sand == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_sand == 'Energy Recharge'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">    
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == sand_id && artifact.rarity == '2'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
         <div class="indicator-item avatar">
                <div v-if="artifact.id == sand_id && artifact.rarity == '2'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                    <img v-if="main_sand == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_sand == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_sand == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_sand == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_sand == 'Energy Recharge'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">    
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == sand_id && artifact.rarity == '1'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == sand_id && artifact.rarity == '1'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                    <img v-if="main_sand == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_sand == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_sand == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_sand == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_sand == 'Energy Recharge'" src="/image/attribute/Icon_Attribute_Energy_Recharge.png">    
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
    </div>
    <div v-for="artifact in artPcs" :key="artifact.id" class="avatar absolute left-16 top-44 indicator">
        <div v-if="goblet_id == null" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
        </div>
        <div v-else-if="artifact.id == goblet_id && artifact.rarity == '5'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == goblet_id && artifact.rarity == '5'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                    <img v-if="main_goblet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_goblet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_goblet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_goblet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_goblet == 'Physical DMG Bonus'" src="/image/attribute/Icon_Attribute_Physical2.png">
                    <img v-else-if="main_goblet == 'Anemo DMG Bonus'" src="/image/attribute/Anemo.png">
                    <img v-else-if="main_goblet == 'Pyro DMG Bonus'" src="/image/attribute/Pyro.png">
                    <img v-else-if="main_goblet == 'Hydro DMG Bonus'" src="/image/attribute/Hydro.png">
                    <img v-else-if="main_goblet == 'Electro DMG Bonus'" src="/image/attribute/Electro.png">
                    <img v-else-if="main_goblet == 'Dendro DMG Bonus'" src="/image/attribute/Dendro.png">
                    <img v-else-if="main_goblet == 'Cryo DMG Bonus'" src="/image/attribute/Cryo.png">
                    <img v-else-if="main_goblet == 'Geo DMG Bonus'" src="/image/attribute/Geo.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
         <div v-else-if="artifact.id == goblet_id && artifact.rarity == '4'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == goblet_id && artifact.rarity == '4'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    <img v-if="main_goblet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_goblet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_goblet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_goblet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_goblet == 'Physical DMG Bonus'" src="/image/attribute/Icon_Attribute_Physical2.png">
                    <img v-else-if="main_goblet == 'Anemo DMG Bonus'" src="/image/attribute/Anemo.png">
                    <img v-else-if="main_goblet == 'Pyro DMG Bonus'" src="/image/attribute/Pyro.png">
                    <img v-else-if="main_goblet == 'Hydro DMG Bonus'" src="/image/attribute/Hydro.png">
                    <img v-else-if="main_goblet == 'Electro DMG Bonus'" src="/image/attribute/Electro.png">
                    <img v-else-if="main_goblet == 'Dendro DMG Bonus'" src="/image/attribute/Dendro.png">
                    <img v-else-if="main_goblet == 'Cryo DMG Bonus'" src="/image/attribute/Cryo.png">
                    <img v-else-if="main_goblet == 'Geo DMG Bonus'" src="/image/attribute/Geo.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
         <div v-else-if="artifact.id == goblet_id && artifact.rarity == '3'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == goblet_id && artifact.rarity == '3'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                    <img v-if="main_goblet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_goblet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_goblet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_goblet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_goblet == 'Physical DMG Bonus'" src="/image/attribute/Icon_Attribute_Physical2.png">
                    <img v-else-if="main_goblet == 'Anemo DMG Bonus'" src="/image/attribute/Anemo.png">
                    <img v-else-if="main_goblet == 'Pyro DMG Bonus'" src="/image/attribute/Pyro.png">
                    <img v-else-if="main_goblet == 'Hydro DMG Bonus'" src="/image/attribute/Hydro.png">
                    <img v-else-if="main_goblet == 'Electro DMG Bonus'" src="/image/attribute/Electro.png">
                    <img v-else-if="main_goblet == 'Dendro DMG Bonus'" src="/image/attribute/Dendro.png">
                    <img v-else-if="main_goblet == 'Cryo DMG Bonus'" src="/image/attribute/Cryo.png">
                    <img v-else-if="main_goblet == 'Geo DMG Bonus'" src="/image/attribute/Geo.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
         <div v-else-if="artifact.id == goblet_id && artifact.rarity == '2'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == goblet_id && artifact.rarity == '2'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                    <img v-if="main_goblet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_goblet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_goblet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_goblet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_goblet == 'Physical DMG Bonus'" src="/image/attribute/Icon_Attribute_Physical2.png">
                    <img v-else-if="main_goblet == 'Anemo DMG Bonus'" src="/image/attribute/Anemo.png">
                    <img v-else-if="main_goblet == 'Pyro DMG Bonus'" src="/image/attribute/Pyro.png">
                    <img v-else-if="main_goblet == 'Hydro DMG Bonus'" src="/image/attribute/Hydro.png">
                    <img v-else-if="main_goblet == 'Electro DMG Bonus'" src="/image/attribute/Electro.png">
                    <img v-else-if="main_goblet == 'Dendro DMG Bonus'" src="/image/attribute/Dendro.png">
                    <img v-else-if="main_goblet == 'Cryo DMG Bonus'" src="/image/attribute/Cryo.png">
                    <img v-else-if="main_goblet == 'Geo DMG Bonus'" src="/image/attribute/Geo.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
         <div v-else-if="artifact.id == goblet_id && artifact.rarity == '1'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == goblet_id && artifact.rarity == '1'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                    <img v-if="main_goblet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_goblet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_goblet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_goblet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_goblet == 'Physical DMG Bonus'" src="/image/attribute/Icon_Attribute_Physical2.png">
                    <img v-else-if="main_goblet == 'Anemo DMG Bonus'" src="/image/attribute/Anemo.png">
                    <img v-else-if="main_goblet == 'Pyro DMG Bonus'" src="/image/attribute/Pyro.png">
                    <img v-else-if="main_goblet == 'Hydro DMG Bonus'" src="/image/attribute/Hydro.png">
                    <img v-else-if="main_goblet == 'Electro DMG Bonus'" src="/image/attribute/Electro.png">
                    <img v-else-if="main_goblet == 'Dendro DMG Bonus'" src="/image/attribute/Dendro.png">
                    <img v-else-if="main_goblet == 'Cryo DMG Bonus'" src="/image/attribute/Cryo.png">
                    <img v-else-if="main_goblet == 'Geo DMG Bonus'" src="/image/attribute/Geo.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
    </div>
    <div v-for="artifact in artPcs" :key="artifact.id" class="avatar absolute left-16 top-60 indicator">
        <div v-if="circlet_id == null" class="mb-8 rounded-btn w-12 h-12" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
        </div>
        <div v-else-if="artifact.id == circlet_id && artifact.rarity == '5'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == circlet_id && artifact.rarity == '5'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }">
                    <img v-if="main_circlet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_circlet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_circlet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_circlet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_circlet == 'CRIT Rate'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="main_circlet == 'CRIT DMG'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="main_circlet == 'Healing Bonus'" src="/image/attribute/Icon_Attribute_Healing.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == circlet_id && artifact.rarity == '4'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == circlet_id && artifact.rarity == '4'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    <img v-if="main_circlet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_circlet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_circlet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_circlet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_circlet == 'CRIT Rate'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="main_circlet == 'CRIT DMG'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="main_circlet == 'Healing Bonus'" src="/image/attribute/Icon_Attribute_Healing.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == circlet_id && artifact.rarity == '3'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == circlet_id && artifact.rarity == '3'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }">
                    <img v-if="main_circlet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_circlet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_circlet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_circlet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_circlet == 'CRIT Rate'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="main_circlet == 'CRIT DMG'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="main_circlet == 'Healing Bonus'" src="/image/attribute/Icon_Attribute_Healing.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == circlet_id && artifact.rarity == '2'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == circlet_id && artifact.rarity == '2'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }">
                    <img v-if="main_circlet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_circlet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_circlet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_circlet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_circlet == 'CRIT Rate'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="main_circlet == 'CRIT DMG'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="main_circlet == 'Healing Bonus'" src="/image/attribute/Icon_Attribute_Healing.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
        <div v-else-if="artifact.id == circlet_id && artifact.rarity == '1'" class="mb-8 rounded-btn w-12 h-12" 
        :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
            <div class="indicator-item avatar">
                <div v-if="artifact.id == circlet_id && artifact.rarity == '1'"  class="text-center rounded-btn w-6 h-6" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }">
                    <img v-if="main_circlet == 'ATK'" src="/image/attribute/Icon_Attribute_Attack.png">
                    <img v-else-if="main_circlet == 'DEF'" src="/image/attribute/Icon_Attribute_Defense.png">
                    <img v-else-if="main_circlet == 'HP'" src="/image/attribute/Icon_Attribute_Health.png">
                    <img v-else-if="main_circlet == 'Elemental Mastery'" src="/image/attribute/Icon_Attribute_Elemental_Mastery.png">
                    <img v-else-if="main_circlet == 'CRIT Rate'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="main_circlet == 'CRIT DMG'" src="/image/attribute/Icon_Attribute_Critical_Hit.png">
                    <img v-else-if="main_circlet == 'Healing Bonus'" src="/image/attribute/Icon_Attribute_Healing.png">
                </div>
            </div>
            <img :src="artifact.icon" >
        </div>
    </div>
</template>
<script>
export default {
    props:['character','artPcs','weapons','weapon_id','refinement','flower_id','plume_id','sand_id','goblet_id','circlet_id','main_sand','main_goblet','main_circlet'],
    methods: {
         showIconWeapon() {
                return "/storage/images/icon/weapon/";
            },
            showIconArtifact() {
                return "/storage/images/icon/artifact/";
            },
            bgRarity(){
                return "../image/rarity/Background_Item_5_Star.png"
            },
            bg5(){
                return "../image/rarity/Background_Item_5_Star.png"
            },
            bg4(){
                return "../image/rarity/Background_Item_4_Star.png"
            },
            bg3(){
                return "../image/rarity/Background_Item_3_Star.png"
            },
            bg2(){
                return "../image/rarity/Background_Item_2_Star.png"
            },
            bg1(){
                return "../image/rarity/Background_Item_1_Star.png"
            },
    },
    computed:{
         test(){
                this.weapon_id
            }
    }
}
</script>