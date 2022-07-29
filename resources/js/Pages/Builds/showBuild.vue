<template>
    <Guest>
        {{build}}
    </Guest>
</template>
<script>
import Guest from "@/Layouts/Guest.vue";
export default{
    components:{
        Guest,
    },
    props:{
        build:Object,
    }
}
</script>