<template>
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Health.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Max Hp</strong>
    <strong class="mr-2 "> <span >{{ build.hp.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
    </strong>
</div> 
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Attack.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Attack</strong>
    <strong class="mr-2 "> <span >{{ build.attack.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Defense.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Defense</strong>
    <strong class="mr-2 "> <span >{{ build.defense.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Elemental Mastery</strong>
    <strong class="mr-2 "> <span >{{ build.elementalMastery.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
    </strong>
</div>
<div class="divider mt-0 mb-0 font-bold"></div>
<div class="flex items-center gap-2">
    <img src="/image/svg/FIGHT_PROP_CRITICAL.svg" class="w-8 h-7">
    <strong class="flex-1 w-64 ">Critical Rate</strong>
    <strong class="mr-2 "> <span >{{ build.criticalRate }}%</span> <br>
    </strong>
</div>
    <div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Critical_Damage.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Critical Damage</strong>
    <strong class="mr-2 "> <span >{{ build.criticalDamage }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build.healingBonus > 0">
    <img src="/image/attribute/Icon_Attribute_Healing.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Healing Bonus</strong>
    <strong class="mr-2 "> <span >{{ build.healingBonus }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Energy_Recharge.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Energy Recharge</strong>
    <strong class="mr-2 "> <span >{{ build.energyRecharge }}%</span> <br>
    </strong>
</div>

<div class="flex items-center gap-2" v-if="build.character.element == 'Water' && build.hydroDamageBonus > 0">
    <img src="/image/attribute/Hydro.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Hydro DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build.hydroDamageBonus }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build.character.element == 'Wind' && build.anemoDamageBonus > 0">
    <img src="/image/attribute/Anemo.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Anemo DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build.anemoDamageBonus }}%</span> <br>
    </strong>
</div> 
<div class="flex items-center gap-2" v-if="build.character.element == 'Fire' && build.pyroDamageBonus > 0">
    <img src="/image/attribute/Pyro.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Pyro DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build.pyroDamageBonus }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build.character.element == 'Ice' && build.cryoDamageBonus > 0">
    <img src="/image/attribute/Cryo.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Cryo DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build.cryoDamageBonus }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build.character.element == 'Electric' && build.electroDamageBonus > 0">
    <img src="/image/attribute/Electro.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Electro DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build.electroDamageBonus }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build.character.element == 'Rock' && build.geoDamageBonus > 0">
    <img src="/image/attribute/Geo.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Geo DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build.geoDamageBonus }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build.physicalDamageBonus > 0">
    <img src="/image/attribute/Icon_Attribute_Physical2.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Physical DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build.physicalDamageBonus }}%</span> <br>
    </strong>
</div>
</template>

<script>
import VueFeather from 'vue-feather';

export default {
    components:{
        VueFeather,
    },
    props: ['build'],
}
</script>