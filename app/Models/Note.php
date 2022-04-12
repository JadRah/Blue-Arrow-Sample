<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory , SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'notes';
    protected $fillable = ['user_id ','content','type','publishing','img'];

    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
