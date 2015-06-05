<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'zones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'static'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['user_id'];

    /**
     * The user that this zone belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
