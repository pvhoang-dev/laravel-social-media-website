<script setup>
import PostItem from "./PostItem.vue";

const post1 = {
    user: {
        id: 1,
        name: "Messi",
    },
    group: null,
    body: `<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem dolores dolorum, ab modi sit laudantium nihil obcaecati voluptatibus suscipit facilis alias tempore quasi velit quidem amet ullam molestias delectus at!</p>`,
    created_at: "2024 05 23 22:12",
};
</script>

<template>
    <div>
        <PostItem />
    </div>
</template>

<style scoped></style>
