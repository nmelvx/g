<?php namespace Admin\General\Models;

use Illuminate\Database\Eloquent\Model;

class ImagesModel extends Model{

    protected $table = 'images';

    protected $fillable = array('path', 'alt', 'description', 'imageable_id', 'imageable_type', 'last_update');

    public function imageable()
    {
        return $this->morphTo();
    }

}