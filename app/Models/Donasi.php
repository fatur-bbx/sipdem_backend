<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Donasi extends Model
{
    use HasFactory;

    protected $table = 'donasi';
    protected $primaryKey = 'id_donasi';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        // Generate UUID for id_donasi attribute when creating a new Donasi
        static::creating(function ($model) {
            $model->id_donasi = Str::uuid()->toString();
        });
    }

    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'id_donatur', 'id_donatur');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}
