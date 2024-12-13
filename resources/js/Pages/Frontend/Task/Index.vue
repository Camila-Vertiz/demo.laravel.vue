<template>
    <div>
        <FrontendLayout>
            <Head title="Tasks"></Head>

            <div class="mt-4 mx-4">
                <div class="flex justify-between">
                    <h5>Tasks List</h5>
                    <Link
                        :href="route('tasks.create')"
                        class="bg-blue-500 text-white p-3 rounded mb-4"
                    >
                        Add Task</Link
                    >
                </div>
                <table
                    class="w-full bg-white border-gray-200 shadow-md rounded my-6"
                >
                    <thead>
                        <tr>
                            <th class="py-2 px-4 text-left border">ID</th>
                            <th class="py-2 px-4 text-left border">Title</th>
                            <th class="py-2 px-4 text-left border">
                                Description
                            </th>
                            <th class="py-2 px-4 text-left border">Status</th>
                            <th class="py-2 px-4 text-left border">Priority</th>
                            <th class="py-2 px-4 text-left border">
                                Created At
                            </th>
                            <th class="py-2 px-4 text-left border">
                                Updated at
                            </th>
                            <th class="py-2 px-4 text-left border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border">1</td>
                            <td class="py-2 px-4 border">2</td>
                            <td class="py-2 px-4 border">3</td>
                            <td class="py-2 px-4 border">4</td>
                            <td class="py-2 px-4 border">5</td>
                            <td class="py-2 px-4 border">6</td>
                            <td class="py-2 px-4 border">7</td>
                            <td class="py-2 px-4 border">
                                <Link
                                    :href="route('tasks.create')"
                                    class="px-2 oy-1 text-sm bg-blue-300 text-dark me-2 rounded inline-block"
                                >
                                    Show
                                </Link>
                                <Link
                                    :href="route('tasks.create')"
                                    class="px-2 oy-1 text-sm bg-green-300 text-dark me-2 rounded inline-block"
                                >
                                    Edit
                                </Link>
                                <button
                                    type="submit"
                                    class="px-2 oy-1 text-sm bg-red-500 text-white me-2 rounded inline-block"
                                >
                                    Detele
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </FrontendLayout>
    </div>
</template>

<script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>
