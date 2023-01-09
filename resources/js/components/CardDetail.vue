<template>
        <div class="board-modal">
            <h3 class="board-modal__title">{{ cardData.title }}</h3>
            <div class="board-modal__description" v-if="!showForm">
                {{ cardData.description }}
            </div>
            <form class="board-modal__form" v-if="showForm">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" v-model="cardTitle" />
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea rows="5" v-model="cardDescription"></textarea>
                </div>
            </form>
            <div class="board-modal__actions">
                <button class="btn-danger" @click="handleCardDeletion" v-if="!showForm">
                    Delete
                </button>
                <button
                    class="btn-primary" v-if="showForm"
                    @click="handleCardUpdate"
                >
                    Save
                </button>
                <button class="btn-primary" v-else @click="showForm = true" >
                    Edit
                </button>
            </div>
        </div>
</template>
<script>
import axios from 'axios';

export default {
    props: {
        cardData: {
            type: Object,
            required: true
        }
    },
    computed: {
        mainButtonTitle() {
            return showForm ? 'Save' : 'Edit';
        }
    },
    data() {
        return {
            showForm: false,
            cardTitle: this.cardData.title,
            cardDescription: this.cardData.description ?? ''
        }
    },
    methods: {
        handleCardUpdate() {
            axios.put(`/api/cards/${this.cardData.id}`, {
                title: this.cardTitle,
                description: this.cardDescription
            })
            .then(() => {
                window.location.reload();
            })
        },

        handleCardDeletion() {
            if(!confirm('Are you sure you want to delete')) return;

            axios.delete(`/api/cards/${this.cardData.id}`)
                .then(() => {
                    window.location.reload();
                })
        }
    }
}
</script>
