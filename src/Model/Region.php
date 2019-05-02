<?php
namespace Woodoocoder\LaravelLocation\Model;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'regions';
    
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
    
    public function __construct(array $attributes = []) {
        $this->table = config('woodoocoder.location.table_prefix').$this->table;
        parent::__construct($attributes);
    }
    
    public function country() {
        return $this->belongsTo(Country::class);
    }
}