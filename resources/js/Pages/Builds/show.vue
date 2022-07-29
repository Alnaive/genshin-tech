<template>
    <div>
        {{build.character.char_name}}<br>
        {{build.flower.name}}<br>
        {{build.plume.name}}<br>
        {{build.sand.name}}<br>
        {{build.goblet.name}}<br>
        {{build.circlet.name}}<br>
        {{build.set4.name}}<br>
        {{build.weapon.name}}<br>
        {{build.character.talent.t1_img}}<br>
        {{build.character.constellation.c1_icon}}<br>
        <p v-for="data in build.party" :key="data.id">
            {{data.char_name}}
        </p>
    </div> 
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    components: {
        Head,
        Link,
    },
    props: {
        build: Object,
    },

}
</script>
