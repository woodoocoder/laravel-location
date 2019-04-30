<?php
namespace Woodoocoder\LaravelLocation\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model {
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location_cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'region_id',
        'name',
        'en_name',
        'latitude',
        'longitude',
        'approved'
    ];
    
    public function country() {
        return $this->belongsTo(Country::class);
    }
    
    public function region() {
        return $this->belongsTo(Region::class);
    }
}