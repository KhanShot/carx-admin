<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = [
        'bin', 'address', 'website', 'phone', 'telegram', 'min_year',
        'pledged', 'arrested', 'crashed', 'right_hand', 'in_kz', 'user_id'
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function balance()
    {
        return $this->hasMany(Transaction::class, 'campaign_id');
    }
}
