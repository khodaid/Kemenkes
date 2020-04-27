<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    protected $table = 'Article';
    public function user(){
        return $this->belongsTo(user::class);
    }

    public function getImage()
    {
        if ($this->photo && $this->photo !== "") {
            return asset('storage/' . $this->photo);
        }

        return "https://dummyimage.com/750x300/000/fff&text=Gambar+Kosong";
    }
}