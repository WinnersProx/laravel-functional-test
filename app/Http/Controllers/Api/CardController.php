<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardListRequest;
use App\Http\Requests\StoreCardRequest;
use App\Models\Card;
use App\Models\Column;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function list(CardListRequest $request): JsonResponse
    {
        $hasValidToken = $request->hasValidAccessToken();

        $data = $hasValidToken ? Column::withFilters($request) : [];

        return response()->json($data, $hasValidToken ? 200 : 204);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCardRequest  $request
     * @return JsonResponse
     */
    public function store(StoreCardRequest $request): JsonResponse
    {
        $column = Column::findOrFail($request->column_id);

        $card = $column->cards()->create(
            $request->only(['title', 'description'])
        );

        return response()->json([
            'success' => true,
            'message' => 'card successfully created',
            'data' => $card
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreCardRequest  $request
     * @param  Card  $card
     * @return JsonResponse
     */
    public function update(StoreCardRequest $request, Card $card): JsonResponse
    {
        $card->update($request->only(['title', 'description']));

        return response()->json([
            'success' => true,
            'message' => 'card successfully created',
            'data' => $card->fresh()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Card  $card
     * @return JsonResponse
     */
    public function destroy(Card $card): JsonResponse
    {
        $card->delete();

        return response()->json([
            'success' => true,
            'message' => 'Card successfully deleted'
        ]);
    }

    public function updateColumn(Request $request, Card $card): JsonResponse
    {
        $oldColumnId = (int) $card->column_id;

        $card->column()->associate((int) $request->column_id);
        $card->save();

        return response()->json([
            'success' => true,
            'message' => 'Card column successfully updated',
            'old_column_id' => $oldColumnId,
            'new_column_id' => (int) $request->column_id
        ]);
    }
}
