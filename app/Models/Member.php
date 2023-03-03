<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Member extends Model
{
    use HasFactory;
    protected $table="member";
    public $timestamps=false;

   protected static function boot()
   {
       parent::boot();
       static::saving(function (Member $member){
           $member->setAttribute("password",Hash::make($member->getAttribute("password")));
           $member->setAttribute("trade_password",Hash::make($member->getAttribute("trade_password")));
       });
   }

    public function level()
    {
        return $this->belongsTo(MemberLevel::class,"level_id","id");
   }
}
