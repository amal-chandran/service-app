<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'addresses';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'address',
                  'state',
                  'district',
                  'pin',
                  'created_by',
                  'service_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the creator for this model.
     *
     * @return App\User
     */
    public function creator()
    {
        return $this->belongsTo('App\User','created_by');
    }

    /**
     * Get the service for this model.
     *
     * @return App\Service
     */
    public function service()
    {
        return $this->belongsTo('App\Service','service_id');
    }



}
