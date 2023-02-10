<script setup>
    import { ref } from 'vue';
    import { router } from '@inertiajs/vue3';
    import { Cropper, CircleStencil } from 'vue-advanced-cropper'
    import Close from 'vue-material-design-icons/Close.vue'
    import Plus from 'vue-material-design-icons/Plus.vue'
    import 'vue-advanced-cropper/dist/style.css';

    const emit = defineEmits(['showModal'])

    let fileInput = ref(null)
    let cropper = ref(null)
    let uploadedImage = ref(null)
    let croppedImageData = {
        file: null,
        imageUrl: null,
        height: null,
        width: null,
        left: null,
        top: null,
    }
    const getUploadedImage = (e) => {
        const file = e.target.files[0]
        uploadedImage.value = URL.createObjectURL(file)
    }
    const crop = () => {
        const { coordinates, canvas } = cropper.value.getResult()
        croppedImageData.imageUrl = canvas.toDataURL()

        let data = new FormData();
        data.append('image', fileInput.value.files[0] || '')
        data.append('height', coordinates.height || '')
        data.append('width', coordinates.width || '')
        data.append('left', coordinates.left || '')
        data.append('top', coordinates.top || '')

        router.post('/user/update-image', data, {
            preserveState: false,
        })
        emit('showModal', false)
    }
</script>

<template>
    <div class="fixed z-50">
        <div class="fixed inset-0 bg-white bg-opacity-60"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex flex-col min-h-full justify-center items-center py-2">

                <div
                    class="
                        transform
                        overflow-hidden
                        rounded-lg
                        bg-white
                        shadow-2xl
                        transition-all
                        max-w-xl
                    "
                >
                    <div class="flex items-center py-4 border-b border-b-gray-300">
                        <div class="text-[22px] font-extrabold w-full text-center">
                            Update profile picture
                        </div>
                        <div
                            @click="$emit('showModal', false)"
                            class="absolute right-3 rounded-full p-1.5 bg-gray-200 hover:bg-gray-300 cursor-pointer"
                        >
                            <Close :size="28" fillColor="#5E6771"/>
                        </div>
                    </div>

                    <div class="flex items-center bg-white px-4 pb-4">
                        <div>
                            <div class="my-4">

                                <label
                                    for="image"
                                    class="
                                        flex
                                        items-center
                                        justify-center
                                        bg-[#E7F3FF]
                                        hover:bg-[#DBE7F2]
                                        font-bold
                                        p-2
                                        rounded-lg
                                        text-[#1977F2]
                                        w-full
                                        cursor-pointer
                                    "
                                >
                                    <Plus :size="20"/> Upload photo
                                </label>
                                <input
                                    type="file"
                                    id="image"
                                    ref="fileInput"
                                    class="hidden"
                                    @change="getUploadedImage"
                                >
                            </div>

                            <div class="w-[350px] mx-auto">
                                <Cropper
                                    class="object-cover"
                                    ref="cropper"
                                    :stencil-component="CircleStencil"
                                    :src="uploadedImage"
                                />
                            </div>

                            <div class="flex gap-4" :class="uploadedImage ? 'pt-4' : ''">
                                <button
                                    @click="$emit('showModal', false)"
                                    type="button"
                                    class="
                                        w-full
                                        justify-center
                                        rounded-md
                                        py-2
                                        text-gray-600
                                        hover:text-gray-800
                                        font-bold
                                        hover:shadow-sm
                                        hover:bg-gray-200
                                        focus:outline-none
                                        focus:ring-0
                                    "
                                >
                                    Cancel
                                </button>
                                <button
                                    v-if="uploadedImage"
                                    @click="crop"
                                    type="button"
                                    class="
                                        w-full
                                        rounded-md
                                        bg-blue-500
                                        py-2
                                        text-white
                                        font-bold
                                        shadow-sm
                                        hover:bg-blue-600
                                        focus:outline-none
                                        focus:ring-0
                                    "
                                >
                                    Crop Image
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
