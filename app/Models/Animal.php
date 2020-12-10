<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Adoption;
use Carbon\Carbon;

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($animal) {
            $animal->{$animal->getKeyName()} = (string) Str::uuid();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function owner(){
        return $this->hasOne(User::class, 'user_id', 'owner');
    }

    public function adoptions(){
        return $this->hasMany(Adoption::class, 'animal_id', 'animal_id');
    }

    /**
     * Accessor for Age.
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }

    public function isOwner(){
        if($this->owner == Auth::id() || $this->adopted_by == Auth::id()){
            return true;
        }else{
            return false;
        }
    }

    public function adoptedBy(){
        return $this->hasOne(User::class, 'user_id', 'adopted_by');
    }

    public function image(){
        return $this->hasOne(Image::class, 'image_id', 'image_id');
    }

    public function isAdopted(){
        if(isset($this->adopted_by)){
            return true;
        }
        
        return false;
    }
}
