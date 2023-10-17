<?php

namespace App\Traits;

use App\Models\Bitacora;

trait BitacoraTrait
{
    public static function addBitacora($data, $proceso)
    {
        $user = Auth()->user();
        Bitacora::create([
            'action' => $proceso,
            'table' => (new self())->getTable(),
            'changes' => $data,
            'user_id' => $user ? $user->id : null
        ]);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($data) {
            self::addBitacora($data, "actualizar");
        });

        static::created(function ($data) {
            self::addBitacora($data, "crear");
        });

        static::deleting(function ($data) {
            self::addBitacora($data, "eliminar");
        });
    }
}
