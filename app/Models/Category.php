<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public static function getTopCategory()
    {
        return self::withCount('foods')
            ->orderByDesc('foods_count')
            ->first();
    }
}
