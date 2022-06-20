<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'description', 
        'category_id', 
        'brand_id', 
        'unit_id', 
        'group_id', 
        'taxable', 
        'tax_type', 
        'tax_id', 
        'product_type', 
        'branch_id', 
        'imageURL', 
        'created_by',];
}
