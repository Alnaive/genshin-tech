<template>
    <Head title="Email Verification" />

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Thanks for signing up! Before getting started, could you verify your
        email address by clicking on the link we just emailed to you? If you
        didn't receive the email, we will gladly send you another.
    </div>

    <div
        class="mb-4 text-sm font-medium text-green-600"
        v-if="verificationLinkSent"
    >
        A new verification link has been sent to the email address you provided
        during registration.
    </div>

    <form @submit.prevent="submit">
        <div class="flex items-center justify-between mt-4">
            <BreezeButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Resend Verification Email
            </BreezeButton>

            <Link
                :href="route('logout')"
                method="post"
                as="button"
                class="text-sm text-blue-600 hover:underline dark:text-blue-400"
                >Log Out</Link
            >
        </div>
    </form>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        Head,
        Link,
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form(),
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('verification.send'))
        },
    },

    computed: {
        verificationLinkSent() {
            return this.status === 'verification-link-sent'
        },
    },
}
</script>
