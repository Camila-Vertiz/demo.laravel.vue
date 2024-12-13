<template>
    <nav class="flex justify-between p-4 bg-gray-800">
        <div class="text-lg font-bold">
            <a class="navbar-item" href="#"> Nala's </a>
        </div>
        <div>
            <ul class="flex gap-x-4 ml-auto">
                <li class="navbar-item">
                    <Link :href="route('home')">Home</Link>
                </li>
                <li class="navbar-item">
                    <Link :href="route('task')">Task</Link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<style scoped>
.navbar {
    background-color: #333;
    color: white;
    padding: 1rem;
}

.navbar-item {
    color: white;
    margin-right: 1rem;
    text-decoration: none;
}

.navbar-item:hover {
    text-decoration: underline;
}
</style>
