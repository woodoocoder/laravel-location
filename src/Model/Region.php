<?php
namespace Woodoocoder\LaravelLocation\Model;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location_regions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'name',
        'en_name',
        'approved'
    ];
    
    public function country() {
        return $this->belongsTo(Country::class);
    }
}