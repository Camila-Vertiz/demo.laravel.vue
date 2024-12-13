<template>
    <div>
        <FrontendLayout>
            <Head title="Create Tasks"></Head>

            <div
                class="mt-6 mx-auto max-w-4xl p-6 bg-white shadow-md rounded-lg"
            >
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-700">
                        Create a New Task
                    </h2>
                    <Link
                        :href="route('tasks.index')"
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300"
                    >
                        Back
                    </Link>
                </div>

                <form
                    @submit.prevent="form.post(route('tasks.store'))"
                    class="space-y-6"
                >
                    <div>
                        <label
                            for="title"
                            class="block text-sm font-medium text-gray-600"
                            >Título</label
                        >
                        <input
                            type="text"
                            id="title"
                            v-model="form.title"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            placeholder="Ingresa el título de la tarea"
                        />
                    </div>

                    <div>
                        <label
                            for="description"
                            class="block text-sm font-medium text-gray-600"
                            >Descripción</label
                        >
                        <input
                            type="text"
                            id="description"
                            v-model="form.description"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            placeholder="Ingresa la descripción de la tarea"
                        />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label
                                for="status"
                                class="block text-sm font-medium text-gray-600"
                                >Estado</label
                            >
                            <select
                                id="status"
                                v-model="form.status"
                                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            >
                                <option value="">Selecciona un estado</option>
                                <option value="pending">Pendiente</option>
                                <option value="in_progress">En proceso</option>
                                <option value="completed">Completada</option>
                            </select>
                        </div>

                        <div>
                            <label
                                for="priority"
                                class="block text-sm font-medium text-gray-600"
                                >Prioridad</label
                            >
                            <select
                                id="priority"
                                v-model="form.priority"
                                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            >
                                <option value="">
                                    Selecciona una prioridad
                                </option>
                                <option value="low">Baja</option>
                                <option value="medium">Media</option>
                                <option value="high">Alta</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4 mt-6">
                        <Link
                            :href="route('tasks.index')"
                            class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300"
                        >
                            Cancel
                        </Link>
                        <button
                            type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600"
                        >
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </FrontendLayout>
    </div>
</template>

<script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
    description: "",
    status: "",
    priority: "",
});
</script>
