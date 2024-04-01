<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = [
        'bin', 'address', 'website', 'phone', 'telegram', 'min_year', 'telegram_user_id',
        'pledged', 'arrested', 'crashed', 'right_hand', 'in_kz', 'user_id', 'lead_point', 'city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function balance()
    {
        return $this->hasMany(Transaction::class, 'campaign_id');
    }
}
