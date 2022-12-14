<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryManReview extends Model
{
    use HasFactory;

    /**
     *The attributes that are mass assignable.
     *
     * @var string[]
     */
     protected $fillable = [
        'user_id',
        'rating',
        'comment'
     ];


    /**
     * Get the user associated with the Delivery Man.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
