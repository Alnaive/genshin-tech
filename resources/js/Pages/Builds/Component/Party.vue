<template>
 <div v-if="healing_bonus > 0 && elemental_dmg > 0 && physical_dmg > 0" class=" absolute left-2 " style="top:50%">
       <div class="flex flex-row gap-2">
         <div v-for="party in party_id" :key="party.id">
                <div class="avatar" v-for="character in characters" :key="character.id">
                    <div class="w-12 h-12 rounded" v-if="party == character.id">
                        <img v-if="character.rarity == '5'" :src="character.icon" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
                        <img v-else :src="character.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div v-else-if="elemental_dmg > 0 && healing_bonus > 0 || physical_dmg > 0" class=" absolute left-2" style="top: 53%">
         <div class="flex flex-row gap-2">
            <div v-for="party in party_id" :key="party.id">
                <div class="avatar" v-for="character in characters" :key="character.id">
                    <div class="w-12 h-12 rounded" v-if="party == character.id">
                        <img v-if="character.rarity == '5'" :src="character.icon" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
                        <img v-else :src="character.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    </div>
                </div>
            </div>
        </div> 
    </div>
     <div v-else-if="elemental_dmg > 0 || physical_dmg >0" class=" absolute left-2" style="top: 57%">
         <div class="flex flex-row gap-2">
            <div v-for="party in party_id" :key="party.id">
                <div class="avatar" v-for="character in characters" :key="character.id">
                    <div class="w-12 h-12 rounded" v-if="party == character.id">
                        <img v-if="character.rarity == '5'" :src="character.icon" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
                        <img v-else :src="character.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    </div>
                </div>
            </div>
        </div> 
    </div>
     <div v-else class="menu  horizontal absolute left-2" style="top:60%;">
        <div class="flex flex-row gap-2">
            <div v-for="party in party_id" :key="party.id">
                <div class="avatar" v-for="character in characters" :key="character.id">
                    <div class="w-12 h-12 rounded" v-if="party == character.id">
                        <img v-if="character.rarity == '5'" :src="character.icon" :style="{ backgroundImage: 'url(' + bgRarity() + ')', backgroundSize:'contain' }">
                        <img v-else :src="character.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }">
                    </div>
                </div>
            </div>
        </div> 
    </div>
    
</template>
<script>
export default {
    props: ['character','party_id','party_two','party_three','characters','physical_dmg','elemental_dmg','healing_bonus',],
    methods:{
         showCharacterIcon(){
                return "/storage/images/icon/character/";
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
    }
}
</script>