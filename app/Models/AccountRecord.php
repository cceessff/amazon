<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountRecord extends Model
{
    use HasFactory;

    protected $table="account_record";
    public $timestamps=false;

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class,"member_id","id");
    }
}
