<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function cards() {

        return $this->hasMany(Card::class);
    }

    public function scopeWithFilters($query, $request)
    {
        if(!$request->date && $request->status != "0")
            return $query->with('cards')->get();

        return $query->with([
            'cards' => function($query) use ($request) {
                $query->filteredCards($request->date, $request->status);
            }
        ])->get();
    }
}
