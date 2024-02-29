<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_id', 'receiver_email', 'invitation_type', 'expiration_time', 'status',
    ];

    protected $dates = ['expiration_time'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
