<?php
namespace Woodoocoder\LaravelLocation\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location_countries';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'en_name',
        'code',
        'short_code',
        'phone_code',
        'approved'
    ];
}