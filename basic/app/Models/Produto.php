<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'preco'];
    
    public function categoria() {
        return $this->belongsTo(Categoria::class); // Define que cada produto pertence a uma categoria
    }

}
