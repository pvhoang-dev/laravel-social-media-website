<template>
    <GuestLayout>
        <div class="text-center">
            <h1 class="text-6xl">404</h1>
            <p class="text-lg">Page not found</p>
            <p>
                We could not find the page you were looking for. Meanwhile, you
                may <router-link to="/">return to dashboard</router-link>.
            </p>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
</script>
