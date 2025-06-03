<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'brand_id',
        'is_active',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public static function resetCategoryIds()
    {
        $brands = self::orderBy('created_at')->get();

        foreach ($brands as $index => $brand) {
            $brand->update([
                'brand_id' => 'BRD-' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
            ]);
        }
    }
}
