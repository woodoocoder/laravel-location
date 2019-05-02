<?php
namespace Woodoocoder\LaravelLocation\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model {
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';

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
    
    public function __construct(array $attributes = []) {
        $this->table = config('woodoocoder.location.table_prefix').$this->table;
        parent::__construct($attributes);
    }
    
    public function country() {
        return $this->belongsTo(Country::class);
    }
    
    public function region() {
        return $this->belongsTo(Region::class);
    }
}