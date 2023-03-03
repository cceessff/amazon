<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAddress extends Model
{
    use HasFactory;
    protected $table="user_address";
    public $timestamps=false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
}
