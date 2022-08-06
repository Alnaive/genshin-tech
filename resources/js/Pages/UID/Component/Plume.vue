<template>
    <div class="card glass w-[440px] h-[105px] card-side flex items-center space-x-4 p-2">
        <figure class="">
        <img class="w-24 h-24" :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${sessionData.equipList[1].flat.icon}.png`" alt="" srcset="">
        <div v-if="sessionData.equipList[1].flat.rankLevel == 5" class="absolute inset-x-0 bottom-[-35px] flex flex-row items-center">
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
        </div>
        <div v-else-if="sessionData.equipList[1].flat.rankLevel == 4" class="absolute inset-x-0 bottom-[-35px] flex flex-row items-center">
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
        </div>
        </figure>
        <div class="w-[95px]">
            <h1 class="font-bold">ATK</h1>
            <pre class="text-xl">{{sessionData.equipList[1].flat.reliquaryMainstat.statValue}}</pre> 
            <span class="badge"><pre>+{{sessionData.equipList[1].reliquary.level - 1}}</pre></span> 
        </div>
        <div class="">
            <ul>
            <li>
                <pre v-if="sessionData.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{sessionData.equipList[1].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{sessionData.equipList[1].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{sessionData.equipList[1].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{sessionData.equipList[1].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{sessionData.equipList[1].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{sessionData.equipList[1].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{sessionData.equipList[1].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{sessionData.equipList[1].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{sessionData.equipList[1].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_HP'">HP+{{sessionData.equipList[1].flat.reliquarySubstats[0].statValue}}</pre>
            </li>
            <li>
                <pre v-if="sessionData.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{sessionData.equipList[1].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{sessionData.equipList[1].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{sessionData.equipList[1].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{sessionData.equipList[1].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{sessionData.equipList[1].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{sessionData.equipList[1].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{sessionData.equipList[1].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{sessionData.equipList[1].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{sessionData.equipList[1].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_HP'">HP+{{sessionData.equipList[1].flat.reliquarySubstats[1].statValue}}</pre>
            </li>
            <li>
                <pre v-if="sessionData.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{sessionData.equipList[1].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{sessionData.equipList[1].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{sessionData.equipList[1].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{sessionData.equipList[1].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{sessionData.equipList[1].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{sessionData.equipList[1].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{sessionData.equipList[1].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{sessionData.equipList[1].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{sessionData.equipList[1].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_HP'">HP+{{sessionData.equipList[1].flat.reliquarySubstats[2].statValue}}</pre>
            </li>
            <li v-if="sessionData.equipList[1].flat.reliquarySubstats.length > 3">
                <pre v-if="sessionData.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{sessionData.equipList[1].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{sessionData.equipList[1].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{sessionData.equipList[1].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{sessionData.equipList[1].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{sessionData.equipList[1].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{sessionData.equipList[1].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{sessionData.equipList[1].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{sessionData.equipList[1].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{sessionData.equipList[1].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="sessionData.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_HP'">HP+{{sessionData.equipList[1].flat.reliquarySubstats[3].statValue}}</pre>
            </li>
        </ul>
        </div>
    </div>
</template>
<script>
import VueFeather from 'vue-feather';

export default{
    components:{
        VueFeather,
    },
    props:['sessionData']
}
</script>