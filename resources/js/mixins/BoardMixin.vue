<script>
export default {
    methods: {
         // TODO: This is a temporary solution to get the column data (needs improvement)
         getNewColumnData(event) {
            const targetCardId = event.item.dataset.card;
            const targetCard = document.querySelector(
                `.board-cards__card[data-card="${targetCardId}"]`
            );
            const newColumn = targetCard.closest('.board-cards');

            return {
                new_column_id: +newColumn.dataset.board_column,
                old_column_id: +event.item.dataset.column,
                id: +targetCardId
            };
        }
    }
}
</script>
