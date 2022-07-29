<template>
    <div class="h-32">
        <figure>
            <img :src="showAvatar() + character.avatar" >
        </figure>
    </div>
    <div class="justify-end card-body">
        <h2 class="card-title">{{character.char_name}}</h2>
        <p class="text-black dark:text-white">{{char.description}}</p>
        <div class="card-actions flex justify-between">
        <Link :href="route('seeBuild', { id: character.slug })"
            class="btn btn-primary gap-1"> <vue-feather type="eye"></vue-feather> Build
        </Link>
        <Link :href="route('addBuild', { id: character.slug })"
            class="btn btn-success gap-1"> <vue-feather type="plus-square"></vue-feather> Build
        </Link>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'
    import VueFeather from 'vue-feather';


export default {
    components:{
        Link,
        VueFeather,
    },
    props: ['character','char'],
    methods:{
        showAvatar() {
            return "/storage/images/icon/avatar/";
        },
    }
}
</script>

