<script setup>
import Close from 'vue-material-design-icons/Close.vue'

import { useGeneralStore } from '@/stores/general';
import { storeToRefs } from 'pinia';
const useGeneral = useGeneralStore()
const { isImageDisplay } = storeToRefs(useGeneral)
</script>

<template>
    <div id="ImageDisplay" class="fixed z-50 top-0 left-0 w-full h-full bg-black bg-opacity-80">
        <Close
            @click="isImageDisplay = null"
            fillColor="#000000" :size="30"
            class="absolute right-0 p-1 m-3 bg-gray-200 rounded-full cursor-pointer"
        />
        <div class="grid h-screen place-items-center">
            <img class="h-screen p-10 object-scale-down" :src="isImageDisplay" alt="">
        </div>
    </div>

</template>
