<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'animal_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'bio',
        'short_bio',
        'gender',
        'breed',
        'birthday',
        'specie_id',
        'image_id',
        'published',
        'views',
        'adopted_by',
        'owner',
        'created_at',
        'updated_at'
    ];
}
