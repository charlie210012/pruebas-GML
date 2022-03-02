<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    
    use HasFactory;
    public function categoria()
    {
        return $this->belongsTo(categoria::class);
    }
    public function empleado_rol()
    {
        return $this->hasMany(empleado_rol::class);
    }
    protected $guarded = [];
}
