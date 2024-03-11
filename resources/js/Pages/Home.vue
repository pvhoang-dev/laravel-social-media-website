<script setup>
import GroupList from "@/Components/app/GroupList.vue";
import FollowingList from "@/Components/app/FollowingList.vue";
import CreatePost from "@/Components/app/CreatePost.vue";
import PostList from "@/Components/app/PostList.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({});
</script>

<template>
    <Head title="Social Media Website" />

    <div class="grid grid-cols-12 gap-3">
        <div class="col-span-3 py-6 px-3">
            <GroupList />
        </div>
        <div class="col-span-6">
            <CreatePost />
            <PostList />
        </div>
        <div class="col-span-3 py-6 px-3">
            <FollowingList />
        </div>
    </div>
</template>

<style></style>
