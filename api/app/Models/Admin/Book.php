<?php

namespace App\Models\Admin;

use App\Models\Admin\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $appends = ['author_name', 'category_name'];
    protected $fillable = [
        'sku',
        'name',
        'slug',
        'short_description',
        'description',
        'type',
        'price',
        'sale_price',
        'stock_qty',
        'category_id',
        'author_id',
        'is_active',
        'is_featured'
    ];

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function getCategoryNameAttribute()
    {
        if ($this->category) {
            return $this->category->name;
        } else {
            return '-';
        }
    }
    public function getAuthorNameAttribute()
    {
        if ($this->author) {
            return $this->author->name;
        } else {
            return '-';
        }
    }
}
