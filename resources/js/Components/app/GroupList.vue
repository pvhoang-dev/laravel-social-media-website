<script setup>
import GroupItem from "@/Components/app/GroupItem.vue";
import TextInput from "../TextInput.vue";
import { ref } from "vue";

const searchKeyword = ref("");
</script>

<template>
    <div class="px-3">
        <h2 class="text-2xl font-bold mb-4">My Groups</h2>
        <TextInput :model-value="searchKeyword" placeholder="Type to search" />
        <div class="py-8">
            <div v-if="false" class="text-gray-400 flex text-center">
                You are not joined to any groups
            </div>
            <div v-else>
                <GroupItem
                    image="https://picsum.photos/100"
                    title="Laravel"
                    description="Lorem ipsum dolor sit amet consectetur adipisicing elit."
                />
                <GroupItem
                    image="https://picsum.photos/103"
                    title="Vue"
                    description="Lorem ipsum dolor sit amet consectetur adipisicing elit."
                />
            </div>
        </div>
    </div>
</template>
