<template>
    <div>
        <Head title="Tasks"></Head>
        <FrontendLayout>
            <div class="mt-4 mx-4">
                <div class="flex justify-between">
                    <h5>Tasks List</h5>
                    <button
                        @click="openModal('create')"
                        class="bg-blue-500 text-white p-3 rounded mb-4"
                    >
                        Add Task
                    </button>
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
                        <tr v-for="(item, index) in tasks" :key="index">
                            <td class="py-2 px-4 border">{{ item.id }}</td>
                            <td class="py-2 px-4 border">{{ item.title }}</td>
                            <td class="py-2 px-4 border">
                                {{ item.description }}
                            </td>
                            <td class="py-2 px-4 border">{{ item.status }}</td>
                            <td class="py-2 px-4 border">
                                {{ item.priority }}
                            </td>
                            <td class="py-2 px-4 border">
                                {{ item.created_at }}
                            </td>
                            <td class="py-2 px-4 border">
                                {{ item.updated_at }}
                            </td>
                            <td class="py-2 px-4 border">
                                <button
                                    @click="openModal('show', item)"
                                    class="px-2 oy-1 text-sm bg-blue-300 text-dark me-2 rounded inline-block"
                                >
                                    Show
                                </button>
                                <button
                                    @click="openModal('edit', item)"
                                    class="px-2 oy-1 text-sm bg-green-300 text-dark me-2 rounded inline-block"
                                >
                                    Edit
                                </button>
                                <button
                                    @click="deleteTask(item.id)"
                                    class="px-2 oy-1 text-sm bg-red-500 text-white me-2 rounded inline-block"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                v-if="modalOpen"
                class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center"
            >
                <div class="bg-white p-4 rounded shadow-lg w-1/3">
                    <h3 v-if="modalType === 'create'">Create Task</h3>
                    <h3 v-if="modalType === 'show'">Task Details</h3>
                    <h3 v-if="modalType === 'edit'">Edit Task</h3>

                    <!-- Modal Content Here -->
                    <div v-if="modalType === 'show'">
                        <p><strong>Title:</strong> {{ currentTask?.title }}</p>
                        <p>
                            <strong>Description:</strong>
                            {{ currentTask?.description }}
                        </p>
                        <p>
                            <strong>Status:</strong> {{ currentTask?.status }}
                        </p>
                        <p>
                            <strong>Priority:</strong>
                            {{ currentTask?.priority }}
                        </p>
                        <p>
                            <strong>Created At:</strong>
                            {{ currentTask?.created_at }}
                        </p>
                        <p>
                            <strong>Updated At:</strong>
                            {{ currentTask?.updated_at }}
                        </p>
                        <div class="mt-4">
                            <button
                                @click="closeModal"
                                class="bg-gray-400 text-white p-2 rounded mr-2"
                            >
                                Close
                            </button>
                        </div>
                    </div>

                    <div v-if="modalType === 'create'">
                        <!-- Form for creating a task -->
                        <form @submit.prevent="saveTask()" class="space-y-6">
                            <div>
                                <label
                                    for="title"
                                    class="block text-sm font-medium text-gray-600"
                                    >Title</label
                                >
                                <input
                                    type="text"
                                    id="title"
                                    v-model="form.title"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                    placeholder="Enter task title"
                                />
                                <div v-if="errors.title" class="error-text">
                                    {{ errors.title }}
                                </div>
                            </div>

                            <div>
                                <label
                                    for="description"
                                    class="block text-sm font-medium text-gray-600"
                                    >Description</label
                                >
                                <input
                                    type="text"
                                    id="description"
                                    v-model="form.description"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                    placeholder="Enter task description"
                                />
                                <div
                                    v-if="errors.description"
                                    class="error-text"
                                >
                                    {{ errors.description }}
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label
                                        for="status"
                                        class="block text-sm font-medium text-gray-600"
                                        >Status</label
                                    >
                                    <select
                                        id="status"
                                        v-model="form.status"
                                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                    >
                                        <option value="">
                                            Select a status
                                        </option>
                                        <option value="pending">Pending</option>
                                        <option value="in_progress">
                                            In Progress
                                        </option>
                                        <option value="completed">
                                            Completed
                                        </option>
                                    </select>
                                    <div
                                        v-if="errors.status"
                                        class="error-text"
                                    >
                                        {{ errors.status }}
                                    </div>
                                </div>

                                <div>
                                    <label
                                        for="priority"
                                        class="block text-sm font-medium text-gray-600"
                                        >Priority</label
                                    >
                                    <select
                                        id="priority"
                                        v-model="form.priority"
                                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                    >
                                        <option value="">
                                            Select a priority
                                        </option>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                    <div
                                        v-if="errors.priority"
                                        class="error-text"
                                    >
                                        {{ errors.priority }}
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button
                                    @click="closeModal"
                                    class="bg-gray-400 text-white p-2 rounded mr-2"
                                >
                                    Close
                                </button>
                                <button
                                    @click="saveTask"
                                    v-if="
                                        modalType === 'edit' ||
                                        modalType === 'create'
                                    "
                                    class="bg-blue-500 text-white p-2 rounded"
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>

                    <div v-if="modalType === 'edit'">
                        <!-- Form for editing task -->
                        <div>
                            <label
                                for="title"
                                class="block text-sm font-medium text-gray-600"
                                >Title</label
                            >
                            <input
                                type="text"
                                id="title"
                                v-model="currentTask.title"
                                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                placeholder="Enter task title"
                            />
                            <div v-if="errors.title" class="error-text">
                                {{ errors.title }}
                            </div>
                        </div>

                        <div>
                            <label
                                for="description"
                                class="block text-sm font-medium text-gray-600"
                                >Description</label
                            >
                            <input
                                type="text"
                                id="description"
                                v-model="currentTask.description"
                                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                placeholder="Enter task description"
                            />
                            <div v-if="errors.description" class="error-text">
                                {{ errors.description }}
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label
                                    for="status"
                                    class="block text-sm font-medium text-gray-600"
                                    >Status</label
                                >
                                <select
                                    id="status"
                                    v-model="currentTask.status"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                >
                                    <option value="">Select a status</option>
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">
                                        In Progress
                                    </option>
                                    <option value="completed">Completed</option>
                                </select>
                                <div v-if="errors.status" class="error-text">
                                    {{ errors.status }}
                                </div>
                            </div>

                            <div>
                                <label
                                    for="priority"
                                    class="block text-sm font-medium text-gray-600"
                                    >Priority</label
                                >
                                <select
                                    id="priority"
                                    v-model="currentTask.priority"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                >
                                    <option value="">Select a priority</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                                <div v-if="errors.priority" class="error-text">
                                    {{ errors.priority }}
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button
                                @click="closeModal"
                                class="bg-gray-400 text-white p-2 rounded mr-2"
                            >
                                Close
                            </button>
                            <button
                                @click="updateTask"
                                class="bg-blue-500 text-white p-2 rounded"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </FrontendLayout>
    </div>
</template>

<script setup>
import { ref } from "vue";
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({ errors: Object, tasks: Array, task: Object });

const modalOpen = ref(false);
const modalType = ref("");
const currentTask = ref(null);

const openModal = (type, task = null) => {
    modalType.value = type;
    currentTask.value = task;
    modalOpen.value = true;
};

var form = useForm({
    title: "",
    description: "",
    status: "",
    priority: "",
});

const saveTask = () => {
    const res = form.post(route("tasks.store")); // Create new task
    modalOpen.value = false;
    form.reset();
};

const updateTask = () => {
    form = useForm({
        title: currentTask.value.title,
        description: currentTask.value.description,
        status: currentTask.value.status,
        priority: currentTask.value.priority,
    });
    const res = form.put(route("tasks.update", currentTask.value.id));
    modalOpen.value = false;
    form = useForm({
        title: "",
        description: "",
        status: "",
        priority: "",
    });
};

const closeModal = () => {
    modalOpen.value = false;
};

const deleteTask = (itemid) => {
    form = useForm({});
    if (confirm("Are you sure you want to delete this task?")) {
        form.delete(route("tasks.destroy", itemid));
    }
};
</script>

<style scoped>
.error-text {
    color: red;
    font-size: 12px;
}
</style>
