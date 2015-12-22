<?php

namespace TrezeVel\Category\Models;

use Illuminate\Database\Eloquent\Model;

/**
* Model de categorias
*/
class Category extends Model
{
    
    protected $table = 'trezevel_categories';

    protected $fillable = [
        'name',
        'active',
        'parent_id'
    ];
}
