<template>
    <div class="board-modal">
        <h3 class="board-modal__title">Add new column</h3>
        <form class="board-modal__form">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" v-model="columnTitle" />
            </div>
        </form>
        <div class="board-modal__actions">
            <button
                @click="handleColumnSubmission"
                class="btn-primary"
            >
                Save
            </button>
        </div>
    </div>
</template>
<script lang="js">
import axios from 'axios';

export default {
props: {
},
data() {
    return {
        columnTitle: ''
    }
},
methods: {
    handleColumnSubmission() {
        axios.post(`/api/columns`, {
            title: this.columnTitle
        })
        .then(() => {
            window.location.reload();
        })
    }
}
}
</script>
