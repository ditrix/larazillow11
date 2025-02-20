<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['beds','baths','area','city','code','street','street_nr', 'price'];

    // многовато уникальности
    // странно, что свое название "owner"
    //может сбить с толку на больших проектах
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class,   // странно, что просто не импортирует класс
            'by_user_id'               // странно, что использует свое, не использует по умольчанию (если параметр пропустить будеи user_id)
        );
    }

}

