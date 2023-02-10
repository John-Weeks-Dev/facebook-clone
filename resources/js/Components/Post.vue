<script setup>
import { toRefs, reactive } from 'vue';
import { Link, router } from '@inertiajs/vue3';

import AccountMultiple from 'vue-material-design-icons/AccountMultiple.vue'
import ThumbUp from 'vue-material-design-icons/ThumbUp.vue'
import Check from 'vue-material-design-icons/Check.vue'
import Delete from 'vue-material-design-icons/Delete.vue'

import { useGeneralStore } from '@/stores/general';
import { storeToRefs } from 'pinia';
const useGeneral = useGeneralStore()
const { isImageDisplay } = storeToRefs(useGeneral)

const form = reactive({ comment: null })

const props = defineProps({
    user: Object,
    post: Object,
    comments: Object,
});

const { post, user, comments } = toRefs(props)

const createComment = () => {
    router.post('/comment', {
        post_id: post.value.id,
        text: form.comment
    },
    {
        preserveScroll: true,
    })
}

const deleteComment = (id) => {
    router.delete('/comment/' + id, {
        preserveScroll: true
    })
}

const deletePost = (id) => {
    router.delete('/post/' + id, {
        preserveScroll: true
    })
}

const isUser = () => {
    router.get('/user/' + user.value.id)
}
</script>

<template>
    <div id="Post" class="w-full bg-white rounded-lg my-4 shadow-md">
        <div class="flex items-center py-3 px-3">
            <button @click="isUser" class="mr-2">
                <img class="rounded-full ml-1 min-w-[42px] max-h-[42px]" :src="user.image">
            </button>
            <div class="flex items-center justify-between p-2 rounded-full w-full">
                <div>
                    <div class="font-extrabold text-[15px]">{{ user.name }}</div>
                    <div class="flex items-center text-xs text-gray-600">
                        {{ post.created_at }} <AccountMultiple class="ml-1" :size="15" fillColor="#64676B"/>
                    </div>
                </div>
                <div class="flex items-center">
                    <button @click="deletePost(post.id)" class="rounded-full p-1.5 cursor-pointer hover:bg-[#F2F2F2]">
                        <Delete fillColor="#64676B"/>
                    </button>
                </div>
            </div>
        </div>
        <div class="px-5 pb-2 text-[17px] font-semibold">{{ post.text }}</div>
        <img @click="isImageDisplay = post.image" class="mx-auto cursor-pointer" :src="post.image">
        <div id="Likes" class="px-5">
            <div class="flex items-center justify-between py-3 border-b">
                <ThumbUp fillColor="#1D72E2" :size="16"/>
                <div class="text-sm text-gray-600 font-semibold">{{ comments.length }} comments</div>
            </div>
        </div>
        <div id="Comments" class="px-3">

            <div id="CreateComment" class="flex items-center justify-between py-2">
                <div class="flex items-center w-full">
                    <Link :href="route('user.show', { id: $page.props.auth.user.id })" class="mr-2">
                        <img class="rounded-full ml-1 min-w-[36px] max-h-[36px]" :src="$page.props.auth.user.image">
                    </Link>
                    <div class="flex items-center justify-center bg-[#EFF2F5] p-2 rounded-full w-full">
                        <input
                            v-model="form.comment"
                            class="
                                w-full
                                mx-1
                                border-none
                                p-0
                                text-sm
                                bg-[#EFF2F5]
                                placeholder-[#64676B]
                                ring-0
                                focus:ring-0
                            "
                            placeholder="Write a public comment..."
                            type="text"
                        >
                        <button
                            type="button"
                            @click="createComment"
                            class="flex items-center text-sm pl-2 pr-3.5 rounded-full bg-blue-500 hover:bg-blue-600 text-white font-bold"
                        >
                            <Check fillColor="#FFFFFF" :size="20"/> Send
                        </button>
                    </div>
                </div>
            </div>

            <div v-if="comments" id="Comments" class="max-h-[120px] overflow-auto pb-2 px-4">
                <div
                    class="flex items-center justify-between pb-2"
                    v-for="comment in comments" :key="comment"
                >
                    <div class="flex items-center w-full mb-1">
                        <Link :href="route('posts.index')" class="mr-2">
                            <img class="rounded-full ml-1 min-w-[36px] max-h-[36px]" :src="comment.user.image">
                        </Link>
                        <div class="flex items-center w-full">
                            <div class="flex items-center bg-[#EFF2F5] text-xs p-2 rounded-lg w-full">
                                {{ comment.text }}
                            </div>
                            <button
                                v-if="$page.props.auth.user.id === comment.user.id"
                                @click="deleteComment(comment.id)"
                                class="rounded-full p-1.5 ml-2 cursor-pointer hover:bg-[#F2F2F2]"
                            >
                                <Delete fillColor="#64676B"/>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
