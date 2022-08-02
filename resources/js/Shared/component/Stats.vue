<template>
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Health.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Max Hp</strong>
    <strong class="mr-2 "> <span >{{ build[0].hp.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
    </strong>
</div> 
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Attack.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Attack</strong>
    <strong class="mr-2 "> <span >{{ build[0].attack.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Defense.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Defense</strong>
    <strong class="mr-2 "> <span >{{ build[0].defense.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Elemental Mastery</strong>
    <strong class="mr-2 "> <span >{{ build[0].elementalMastery.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0}) }}</span> <br>
    </strong>
</div>
<div class="divider mt-0 mb-0 font-bold"></div>
<div class="flex items-center gap-2">
    <img src="/image/svg/FIGHT_PROP_CRITICAL.svg" class="w-8 h-7">
    <strong class="flex-1 w-64 ">Critical Rate</strong>
    <strong class="mr-2 "> <span >{{ build[0].criticalRate }}%</span> <br>
    </strong>
</div>
    <div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Critical_Damage.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Critical Damage</strong>
    <strong class="mr-2 "> <span >{{ build[0].criticalDamage }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2">
    <img src="/image/attribute/Icon_Attribute_Energy_Recharge.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Energy Recharge</strong>
    <strong class="mr-2 "> <span >{{ build[0].energyRecharge }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build[0].healingBonus > 0">
    <img src="/image/attribute/Icon_Attribute_Healing_Bonus.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Healing Bonus</strong>
    <strong class="mr-2 "> <span >{{ build[0].healingBonus }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build[0].character.element == 'Water' && build[0].hydroDamageBonus > 0">
    <img src="/image/attribute/Hydro.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Hydro DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build[0].hydroDamageBonus }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build[0].character.element == 'Wind' && build[0].anemoDamageBonus > 0">
    <img src="/image/attribute/Anemo.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Anemo DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build[0].anemoDamageBonus }}%</span> <br>
    </strong>
</div> 
<div class="flex items-center gap-2" v-if="build[0].character.element == 'Fire' && build[0].pyroDamageBonus > 0">
    <img src="/image/attribute/Pyro.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Pyro DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build[0].pyroDamageBonus }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build[0].character.element == 'Ice' && build[0].cryoDamageBonus > 0">
    <img src="/image/attribute/Cryo.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Cryo DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build[0].cryoDamageBonus }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build[0].character.element == 'Electric' && build[0].electroDamageBonus > 0">
    <img src="/image/attribute/Electro.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Electro DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build[0].electroDamageBonus }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build[0].character.element == 'Rock' && build[0].geoDamageBonus > 0">
    <img src="/image/attribute/Geo.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Geo DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build[0].geoDamageBonus }}%</span> <br>
    </strong>
</div>
<div class="flex items-center gap-2" v-if="build[0].physicalDamageBonus > 0">
    <img src="/image/attribute/Icon_Attribute_Physical2.png" class="w-8 h-8">
    <strong class="flex-1 w-64">Physical DMG Bonus</strong>
    <strong class="mr-2 "> <span >{{ build[0].physicalDamageBonus }}%</span> <br>
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