<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Column;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function list(Request $request)
    {
        $data = Column::withFilters($request);

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $column = Column::findOrFail($request->column_id);

        $card = $column->cards()->create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json([
            'success' => true,
            'message' => 'card successfully created',
            'data' => $card
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $card->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json([
            'success' => true,
            'message' => 'card successfully created',
            'data' => $card->fresh()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return response()->json([
            'success' => true,
            'message' => 'Card successfully deleted'
        ]);
    }

    public function updateColumn(Request $request, Card $card)
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
