<template>
    <div class="board-modal">
        <h3 class="board-modal__title">Add new card in ({{ cardData.columnTitle }})</h3>
        <form class="board-modal__form">
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
            <button
                @click="handleCardSubmission"
                class="btn-primary"
            >
                Save
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
data() {
    return {
        cardTitle: '',
        cardDescription: ''
    }
},
methods: {
    handleCardSubmission() {
        axios.post(`/api/cards`, {
            title: this.cardTitle,
            column_id: this.cardData.columnId,
            description: this.cardDescription
        })
        .then(() => {
            window.location.reload();
        })
    }
}
}
</script>
