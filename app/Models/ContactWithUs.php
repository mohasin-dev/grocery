<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactWithUs extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'subject',
        'massage'
    ];




    /**
     * Return the store's manager
     *
     * @return Relationship
     */
    public function country() {
        return $this->belongsTo( Country::class );
    }
}
