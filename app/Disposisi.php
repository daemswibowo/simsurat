<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disposisi extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'disposisis';

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
    protected $fillable = ['no_disposisi', 'no_agenda', 'surat_id', 'kepada', 'keterangan', 'tanggapan', 'user_id'];

    public function surat ()
    {
        return $this->belongsTo('App\Surat');
    }

    public function user ()
    {
        return $this->belongsTo('App\User');
    }
}
