<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    const CREATED = 'CREATED';
    const UPDATED = 'UPDATED';
    const DELETED = 'DELETED';

    protected $fillable = [
        'auditable_type', 
        'auditable_id', 
        'old_values', 
        'new_values', 
        'action',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function auditable()
    {
        return $this->morphTo();
    }
}
