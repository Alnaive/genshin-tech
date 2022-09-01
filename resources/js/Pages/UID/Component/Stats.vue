<template>
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Health.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Max Hp</strong>
    <strong class="mr-2 "> <span >{{ sessionData.fightPropMap[2000].toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
    </strong>
</div> 
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Attack.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Attack</strong>
    <strong class="mr-2 "> <span >{{ sessionData.fightPropMap[2001].toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Defense.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Defense</strong>
    <strong class="mr-2 "> <span >{{ sessionData.fightPropMap[2002].toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Elemental Mastery</strong>
    <strong class="mr-2 "> <span >{{ sessionData.fightPropMap[28].toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
    </strong>
</div>
<div class="divider mt-0 mb-0 font-bold"></div>
<div class="flex items-center gap-2">
    <img src="/image/svg/FIGHT_PROP_CRITICAL.svg" class="w-8 h-7">
    <strong class="flex-1 w-64 ">Critical Rate</strong>
    <strong class="mr-2 "> <span >{{ parseFloat(sessionData.fightPropMap[20] * 100).toFixed(1) }}%</span> <br>
    </strong>
</div>
    <div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Critical_Damage.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Critical Damage</strong>
    <strong class="mr-2 "> <span >{{ parseFloat(sessionData.fightPropMap[22] * 100).toFixed(1) }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="sessionData.fightPropMap[26] > 0">
    <img src="/image/attribute/Icon_Attribute_Healing.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Healing Bonus</strong>
    <strong class="mr-2 "> <span >{{ parseFloat(sessionData.fightPropMap[26] * 100).toFixed(1) }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Energy_Recharge.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Energy Recharge</strong>
    <strong class="mr-2 "> <span >{{ parseFloat(sessionData.fightPropMap[23] * 100).toFixed(1) }}%</span> <br>
    </strong>
</div>

<div class="flex items-center gap-2" v-if="charData.element == 'Water' && sessionData.fightPropMap[42] > 0">
    <img src="/image/attribute/Hydro.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Hydro DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ parseFloat(sessionData.fightPropMap[42] * 100).toFixed(1) }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="charData.element == 'Wind' && sessionData.fightPropMap[44] > 0">
    <img src="/image/attribute/Anemo.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Anemo DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ parseFloat(sessionData.fightPropMap[44] * 100).toFixed(1) }}%</span> <br>
    </strong>
</div> 
<div class="flex items-center gap-2" v-if="charData.element == 'Fire' && sessionData.fightPropMap[40] > 0">
    <img src="/image/attribute/Pyro.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Pyro DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ parseFloat(sessionData.fightPropMap[40] * 100).toFixed(1) }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="charData.element == 'Ice' && sessionData.fightPropMap[46] > 0">
    <img src="/image/attribute/Cryo.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Cryo DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ parseFloat(sessionData.fightPropMap[46] * 100).toFixed(1) }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="charData.element == 'Electric' && sessionData.fightPropMap[41] > 0">
    <img src="/image/attribute/Electro.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Electro DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ parseFloat(sessionData.fightPropMap[41] * 100).toFixed(1) }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="charData.element == 'Rock' && sessionData.fightPropMap[45] > 0">
    <img src="/image/attribute/Geo.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Geo DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ parseFloat(sessionData.fightPropMap[45] * 100).toFixed(1) }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="charData.element == 'Grass' && sessionData.fightPropMap[43] > 0">
    <img src="/image/attribute/Dendro.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Dendro DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ parseFloat(sessionData.fightPropMap[43] * 100).toFixed(1) }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="sessionData.fightPropMap[30] > 0">
    <img src="/image/attribute/Icon_Attribute_Physical2.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Physical DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ parseFloat(sessionData.fightPropMap[30] * 100).toFixed(1) }}%</span> <br>
    </strong>
</div>
</template>

<script>
import VueFeather from 'vue-feather';

export default {
    components:{
        VueFeather,
    },
    props: ['charData', 'sessionData'],
}
</script>