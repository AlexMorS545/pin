<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public static $name = 'Продукты';

    const TABLE = 'products';

    const AVAILABLE = 'AVAILABLE';
    const NOT_AVAILABLE = 'NOT_AVAILABLE';

    protected $fillable = [
        'article',
        'name',
        'status',
        'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public static array $statuses = [
        self::AVAILABLE => 'Доступен',
        self::NOT_AVAILABLE => 'Не доступен'
    ];

    public static function availableProducts()
    {
        return self::where('status', self::AVAILABLE)->get();
    }
}
