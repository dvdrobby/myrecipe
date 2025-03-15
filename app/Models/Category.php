<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'icon'
    ];

    public function setNameAttribute($values)
    {
        $this->attributes['name'] = $values;
        $this->attributes['slug'] = Str::slug($values);
    }

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
