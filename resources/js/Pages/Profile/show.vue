<template>
    <Head title="Account" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Show User {{ user.name }}
                </h2>

                
            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            {{user.name}}
           <div v-if="user.name ==  $page.props.auth.user.name ">
                <Link :href="route('profileEdit', { id: user.id })" class="text-indigo-600 hover:text-indigo-900">Edit</Link>                    
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
    },
    props: {
        user: Object,
    },

}
</script>
