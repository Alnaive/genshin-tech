<template>
    <div class="flex items-center gap-2"> 
        <img src="/image/attribute/Icon_Attribute_Health.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Max Hp</strong>
        <strong class="mr-2">{{HpFormat}}</strong>
    </div>

    <div class="flex items-center gap-2">
        <img src="/image/attribute/Icon_Attribute_Attack.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Attack</strong>
        <strong class="mr-2">{{AtkFormat}}</strong> 
    </div> 
    <div class="flex items-center gap-2">
        <img src="/image/attribute/Icon_Attribute_Defense.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Defense</strong>
        <strong class="mr-2">{{DefenseFormat}}</strong> 
    </div>
    <div class="flex items-center gap-2">
        <img src="/image/attribute/Icon_Attribute_Elemental_Mastery.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Elemental Mastery</strong> 
        <strong class="mr-2">{{EmFormat}}</strong>
    </div>

    <!-- <div class="divider before:bg-black after:bg-black dark:before:bg-white dark:after:bg-white"></div> -->
    <div class="divider before:bg-white after:bg-white dark:before:bg-white dark:after:bg-white"></div>

    <div class="flex items-center gap-2">
        <img src="/image/attribute/Icon_Attribute_Critical_Hit.png" class="w-8 h-8">
        <strong class="flex-1 w-64">CRIT Rate</strong>
        <strong class="mr-2">{{c_rate}} %</strong> 
    </div> 
    <div class="flex items-center gap-2">
        <img src="/image/attribute/Icon_Attribute_Critical_Hit.png" class="w-8 h-8">
        <strong class="flex-1 w-64">CRIT Damage</strong>
        <strong class="mr-2">{{c_damage}} %</strong> 
    </div>
    <div class="flex items-center gap-2" v-if="healing_bonus > 0">
        <img src="/image/attribute/Icon_Attribute_Healing.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Healing Bonus</strong> 
        <strong class="mr-2">{{healing_bonus}} %</strong>
    </div> 
    <div class="flex items-center gap-2"> 
        <img src="/image/attribute/Icon_Attribute_Energy_Recharge.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Energy Recharge</strong>
        <strong class="mr-2">{{er}} %</strong>
    </div>
    <div class="flex items-center gap-2" v-if="elemental_dmg > 0 && main_goblet =='Pyro DMG Bonus'"> 
        <img  src="/image/attribute/Pyro.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Pyro DMG Bonus</strong>
        <strong class="mr-2">{{elemental_dmg}} %</strong>
    </div>
    <div class="flex items-center gap-2" v-else-if="elemental_dmg > 0 && main_goblet =='Hydro DMG Bonus'"> 
        <img  src="/image/attribute/Hydro.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Hydro DMG Bonus</strong>
        <strong class="mr-2">{{elemental_dmg}} %</strong>
    </div>
    <div class="flex items-center gap-2" v-else-if="elemental_dmg > 0 && main_goblet =='Anemo DMG Bonus'"> 
        <img  src="/image/attribute/Anemo.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Anemo DMG Bonus</strong>
        <strong class="mr-2">{{elemental_dmg}} %</strong>
    </div>
    <div class="flex items-center gap-2" v-else-if="elemental_dmg > 0 && main_goblet =='Electro DMG Bonus'"> 
        <img  src="/image/attribute/Electro.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Electro DMG Bonus</strong>
        <strong class="mr-2">{{elemental_dmg}} %</strong>
    </div>
    <div class="flex items-center gap-2" v-else-if="elemental_dmg > 0 && main_goblet =='Dendro DMG Bonus'"> 
        <img  src="/image/attribute/Dendro.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Dendro DMG Bonus</strong>
        <strong class="mr-2">{{elemental_dmg}} %</strong>
    </div>
    <div class="flex items-center gap-2" v-else-if="elemental_dmg > 0 && main_goblet =='Cryo DMG Bonus'"> 
        <img  src="/image/attribute/Cryo.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Cryo DMG Bonus</strong>
        <strong class="mr-2">{{elemental_dmg}} %</strong>
    </div>
    <div class="flex items-center gap-2" v-else-if="elemental_dmg > 0 && main_goblet =='Geo DMG Bonus'"> 
        <img  src="/image/attribute/Geo.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Geo DMG Bonus</strong>
        <strong class="mr-2">{{elemental_dmg}} %</strong>
    </div>
    <div class="flex items-center gap-2" v-else-if="elemental_dmg > 0 "> 
        <img  :src="showElement()" class="w-8 h-8">
        <strong class="flex-1 w-64" v-if="character.element == 'Geo'">Geo DMG Bonus</strong>
        <strong class="flex-1 w-64" v-else-if="character.element == 'Cryo'">Cryo DMG Bonus</strong>
        <strong class="flex-1 w-64" v-else-if="character.element == 'Dendro'">Dendro DMG Bonus</strong>
        <strong class="flex-1 w-64" v-else-if="character.element == 'Electro'">Electro DMG Bonus</strong>
        <strong class="flex-1 w-64" v-else-if="character.element == 'Anemo'">Anemo DMG Bonus</strong>
        <strong class="flex-1 w-64" v-else-if="character.element == 'Hydro'">Hydro DMG Bonus</strong>
        <strong class="flex-1 w-64" v-else-if="character.element == 'Pyro'">Pyro DMG Bonus</strong>
        <strong class="mr-2">{{elemental_dmg}} %</strong>
    </div>
    <div class="flex items-center gap-2" v-if="physical_dmg > 0"> 
        <img src="/image/attribute/Icon_Attribute_Physical2.png" class="w-8 h-8">
        <strong class="flex-1 w-64">Physical DMG Bonus</strong>
        <strong class="mr-2">{{physical_dmg}} %</strong>
    </div>
</template>

<script>

export default {
    props: ['character','hp','atk','defense','em','c_rate','c_damage','healing_bonus','er','elemental_dmg','physical_dmg','main_goblet'],
    methods:{
         showElement(){
            const ele = this.character.element;
            if(ele == "Cryo"){
                return "/image/attribute/Cryo.png"
            } else if(ele == "Geo"){
                return "/image/attribute/Geo.png"
            } else if(ele == "Dendro"){
                return "/image/attribute/Dendro.png"
            } else if(ele == "Anemo"){
                return "/image/attribute/Anemo.png"
            } else if(ele == "Electro"){
                return "/image/attribute/Electro.png"
            } else if(ele == "Hydro"){
                return "/image/attribute/Hydro.png"
            } else if(ele == "Pyro"){
                return "/image/attribute/Pyro.png"
            }
        },
    },
    computed:{
        HpFormat(){
            const formatter = new Intl.NumberFormat('us');
                return formatter.format(this.hp);
            },
        AtkFormat(){
            const formatter = new Intl.NumberFormat('us');
                return formatter.format(this.atk);
            },
        DefenseFormat(){
            const formatter = new Intl.NumberFormat('us');
                return formatter.format(this.defense);
            },
        EmFormat(){
            const formatter = new Intl.NumberFormat('us');
                return formatter.format(this.em) ;
            },
        }
}
</script>