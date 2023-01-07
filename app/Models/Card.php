<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Card extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description'];

    public function column()
    {
        return $this->belongsTo(Column::class);
    }

    public function scopeFilteredCards($query, $creationDate, $status) {
        if($creationDate) {
            $query->whereDate('created_at', $creationDate);
        }

        if($status == "0" ) {
            $query->onlyTrashed();
        }
    }
}
