<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Column;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ColumnController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(['title' => 'required|string']);

        $column = Column::create([
            'title' => $request->title
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Column successfully created',
            'data' => $column
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Column  $column
     * @return JsonResponse
     */
    public function destroy(Column $column): JsonResponse
    {
        $column->cards()->delete();

        $column->delete();

        return response()->json([
            'success' => true,
            'message' => 'Column and related data successfully deleted'
        ]);
    }
}
