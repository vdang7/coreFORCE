<script setup>
import { ref } from "vue";
import Container from "@/Components/Container.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { PhotoIcon } from "@heroicons/vue/24/solid";
import { useForm } from "@inertiajs/vue3";

const inputClass =
    "mt-2 w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm";

let currentImageName = ref("");

const handleFileChange = (event) => {
    const file = event.target.files[0];
    form.image = file;
    currentImageName.value = file.name;
};

const form = useForm({
    name: "",
    description: "",
    price: "",
    quantity: "",
    image: null,
});

const submit = () => {
    form.post(route("products.store"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <section class="py-16 sm:py-24">
        <Container>
            <form
                @submit.prevent="submit"
                class="rounded-xl border border-gray-200 space-y-4 bg-white px-10 pt-7 pb-7 max-w-2xl mx-auto"
                method="POST"
                enctype="multipart/form-data"
            >
                <div>
                    <InputLabel for="name" value="Product name" />
                    <input
                        :class="inputClass"
                        type="text"
                        v-model="form.name"
                        required
                    />
                </div>

                <div>
                    <InputLabel for="description" value="Product description" />
                    <textarea
                        :class="inputClass"
                        v-model="form.description"
                        required
                    ></textarea>
                </div>

                <div>
                    <InputLabel for="price" value="Product price" />
                    <input
                        :class="inputClass"
                        type="number"
                        step=".01"
                        v-model="form.price"
                    />
                </div>

                <div>
                    <InputLabel for="quantity" value="Product quantity" />
                    <input
                        :class="inputClass"
                        type="number"
                        v-model="form.quantity"
                    />
                </div>

                <div>
                    <label
                        for="product-image"
                        class="block text-sm/6 font-medium text-gray-900"
                        >Product image</label
                    >
                    <div
                        class="mb-8 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
                    >
                        <div class="text-center">
                            <PhotoIcon
                                class="mx-auto size-12 text-gray-300"
                                aria-hidden="true"
                            />
                            <div class="text-sm/6 text-gray-600">
                                <label
                                    for="image"
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-primary-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-600 focus-within:ring-offset-2 hover:text-primary-500"
                                >
                                    <span>Upload a file</span>
                                    <input
                                        id="image"
                                        name="image"
                                        type="file"
                                        @change="handleFileChange"
                                        class="sr-only"
                                    />
                                </label>
                                <p
                                    v-if="currentImageName"
                                    class="mt-2 text-gray-600"
                                >
                                    Selected Image: {{ currentImageName }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <input
                    type="submit"
                    value="Add product"
                    class="bg-primary-600 cursor-pointer hover:-translate-y-1 hover:translate-x-1 transition-transform hover:bg-primary-700 text-white rounded-full px-4 py-1.5 font-medium ml-auto block"
                />
            </form>
        </Container>
    </section>
</template>
