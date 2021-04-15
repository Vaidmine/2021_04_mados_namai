<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Master;

class Outfit extends Model
{
    use HasFactory;
    public function outfitAuthor()
    {
        return $this->belongsTo('App\Models\Master', 'master_id', 'id');
    }
 

}
