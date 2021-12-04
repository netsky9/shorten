<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title',
        'slug',
        'description_html',
        'title_seo',
        'description_seo'
    ];

    public function parentCategory(){
        return $this->belongsTo(ProductCategory::class, 'parent_id', 'id');
    }

    /**
     * Аксессор для определения родительской категории
     * @return string
     */
    public function getParentTitleAttribute(){
        return empty($this->parentCategory->title) ? ' - ' : $this->parentCategory->title;
    }

}
