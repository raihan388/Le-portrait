<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'is_active',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public static function resetCategoryIds()
    {
        $categories = self::orderBy('created_at')->get();

        foreach ($categories as $index => $category) {
            $category->update([
                'category_id' => 'CAT-' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
            ]);
        }
    }
}
