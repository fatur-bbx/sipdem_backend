<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    protected $primaryKey = 'id_feedback';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        // Generate UUID for id_feedback attribute when creating a new Feedback
        static::creating(function ($model) {
            $model->id_feedback = Str::uuid()->toString();
        });
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }

    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'id_donatur', 'id_donatur');
    }
}
