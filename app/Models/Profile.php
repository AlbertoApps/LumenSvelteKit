<?php

namespace App\Models;

class Profile extends AuditableModel
{
    protected $fillable = [
        'description', 
        'is_administrator', 
        'active'
    ];

    protected $casts = [
        "is_administrator" => "boolean",
        "active" => "boolean"
    ];
}
