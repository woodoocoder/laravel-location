<?php
namespace Woodoocoder\LaravelLocation\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';
    
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

    public function __construct(array $attributes = []) {
        $this->table = config('woodoocoder.location.table_prefix').$this->table;
        parent::__construct($attributes);
    }

}