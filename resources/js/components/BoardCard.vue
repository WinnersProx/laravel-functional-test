<template>
    <div
        class="board-cards__card"
        :data-card="cardData.id"
        :data-column="cardData.column_id"
        @click="() => onCardClick(cardData)"
        >
        <div class="board-cards__card-title">
            {{ cardData.title }}
        </div>
    </div>
</template>
<script>
export default {
    props: {
        cardData: {
            type: Object,
            required: true
        },
        onCardClick: {
            type: Function,
            required: true
        }
    }
}
</script>
