<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Dashboard
                </h2>
            </div>
        </template>

       
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import Pagination from '@/Components/Pagination'
import pickBy from 'lodash/pickBy'
    import throttle from 'lodash/throttle'


export default {
    components: {
        BreezeAuthenticatedLayout,
        Head, Link, Pagination,
      
    },
    props:{
        builds: Object,
        characters: Object,
        artifactPcs: Object,
        weapons: Object,
    },
    data(){
        return {
            term: {
                    search: this.builds,
                },
        }
    },
     watch: {
            term: {
                deep: true,
                handler: throttle(function () {
                    this.$inertia.get(this.route('Dashboard'), pickBy(this.term), { preserveState: true })
                }, 150),
            },
        },
    methods: {
       
    }
}
</script>
