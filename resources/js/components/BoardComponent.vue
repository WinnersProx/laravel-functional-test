<template>
    <div>
        <div class="board-columns">
            <div v-for="columnData in columnsData" :key="columnData.id">
                <div class="board-columns__column">
                    <div class="board-columns__column-title">
                        <div>{{ columnData.title }}</div>
                        <span
                            class="delete-icon"
                            title="Delete column"
                            @click="handleDeleteColumn(columnData.id)"
                            >x</span
                        >
                    </div>
                    <div class="board-columns__column-body">
                        <div
                            class="board-cards"
                            :data-board_column="columnData.id"
                        >
                            <draggable
                                :list="columnData.cards"
                                group="boardCards"
                                @end="onColumnDataChange"
                                draggable=".board-cards__card"
                                :data-column="columnData.id"
                            >
                                <BoardCard
                                    v-for="cardData in columnData.cards"
                                    :cardData="cardData"
                                    :key="cardData.id"
                                    :onCardClick="handleCardClick"
                                />
                            </draggable>
                        </div>
                    </div>
                    <div class="board-columns__column-footer">
                        <div @click="() => showCardForm(columnData)">
                            + Add new card
                        </div>
                    </div>
                </div>
            </div>
            <div class="board-columns__new" v-if="!hasInvalidToken">
                <button @click="showColumnForm">+ Add New column </button>
            </div>
        </div>
        <div class="board-export" v-if="columnsData.length">
            <button><a href="/export-data">Export DB</a></button>
        </div>
    </div>
</template>
<script lang="js">
import BoardCard from './BoardCard.vue';
import BoardMixin from '../mixins/BoardMixin.vue';
import CardDetails from './CardDetail.vue';
import draggable from 'vuedraggable';
import axios from 'axios';
import CardForm from './CardForm.vue';
import ColumnForm from './ColumnForm.vue';

export default {
    data() {
        return {
            columnsData : [],
            hasInvalidToken: false
        }
    },
    mounted() {
        this.fetchColumnsData();
    },
    methods: {
        fetchColumnsData() {
            const params = new URLSearchParams(window.location.search);

            axios.get(`/api/list-cards?${params.toString()}`).then((response) => {
                this.columnsData = response.data;
                this.hasInvalidToken = response.status === 204;
            })
        },
        onColumnDataChange(event) {
            const { id, old_column_id, new_column_id } = this.getNewColumnData(event);

            if(new_column_id === old_column_id) return;

            axios.patch(`/api/card/update-column/${id}/${new_column_id}`);
        },
        handleCardClick(cardData) {
            this.$modal.show(CardDetails, { cardData });
        },
        showCardForm(column) {
            this.$modal.show(CardForm, {
                cardData: { columnTitle: column.title, columnId:column.id }
            });
        },
        showColumnForm() {
            this.$modal.show(ColumnForm);
        },
        handleDeleteColumn(columnId) {
            if(!confirm('Are you sure you want to delete')) return;

            axios.delete(`/api/columns/${columnId}`)
                .then(() => {
                    window.location.reload();
                })
        }
    },
    components: {
        BoardCard,
        draggable
    },
    mixins: [BoardMixin]
}
</script>
