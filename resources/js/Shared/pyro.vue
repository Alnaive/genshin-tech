<template>
    <div>
        <div v-for="character in characters" :key="character.id" class="avatar m-3 cell relative cursor-pointer transition duration-100  hover:shadow-xl rounded-xl ">
                        <div v-if="character.element == 'Pyro'">
                            <div class="mb-8 rounded-btn w-24 h-24">
                            <Link :href="route('Characters.edit', { id: character.id })">
                            <img :src="showCharIcon() + character.char_icon" class="object-contain md:object-scale-down" />

                                            </Link>
                        </div>
                        <div class="avatar absolute top-0 right-0 w-7 h-7">
                            <img v-if="character.element == 'Anemo'" src="image/Element_Anemo.png" class="object-contain md:object-scale-down" />
                            <img v-else-if="character.element == 'Cryo'" src="image/Element_Cryo.png" class="object-contain md:object-scale-down" />
                            <img v-else-if="character.element == 'Dendro'" src="image/Element_Dendro.png" class="object-contain md:object-scale-down" />
                            <img v-else-if="character.element == 'Electro'" src="image/Element_Electro.png" class="object-contain md:object-scale-down" />
                            <img v-else-if="character.element == 'Geo'" src="image/Element_Geo.png" class="object-contain md:object-scale-down" />
                            <img v-else-if="character.element == 'Hydro'" src="image/Element_Hydro.png" class="object-contain md:object-scale-down" />
                            <img v-else src="image/Element_Pyro.png" class="object-contain md:object-scale-down" />
                        </div>
                        <div class="w-full bg-green-500 overflow-hidden absolute bottom-0 text-center">
                            <kbd v-if="character.char_name == 'Kaedehara Kazuha'">Kazuha</kbd>
                            <kbd v-else-if="character.char_name =='Raiden Shogun'">Raiden</kbd>
                            <kbd v-else>{{character.char_name}}</kbd>
                        </div>
                        </div>
                    </div> 
    </div>
</template>