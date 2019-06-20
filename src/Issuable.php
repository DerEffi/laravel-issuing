<?php

namespace DerEffi\Issuing;

use Illuminate\Support\Facades\Auth;

trait Issuable {

    public static function bootIssuing() {

        $issuerModel = config('issuing.model');
        $issuerIdColumn = config('issuing.id_column');
        $creatorColumn = config('issuing.creator_column');
        $updatorColumn = config('issuing.updator_column');
        $deletorColumn = config('issuing.deletor_column');

        static::creating(function ($element) {
            if(Auth::check()) {
                $element->{$creatorColumn} = Auth::user()->{$issuerIdColumn};
            }
        });

        static::updating(function ($element) {
            if(Auth::check()) {
                $element->{$updatorColumn} = Auth::user()->{$issuerIdColumn};
            }
        });

        static::deleting(function ($element) {
            if(Auth::check()) {
                $element->{$deletorColumn} = Auth::user()->{$issuerIdColumn};
            }
        });

    }

    public function creator() {
        return $this->belongsTo($issuerModel, $creatorColumn, $issuerIdColumn);
    }

    public function updator() {
        return $this->belongsTo($issuerModel, $updatorColumn, $issuerIdColumn);
    }

    public function deletor() {
        return $this->belongsTo($issuerModel, $deletorColumn, $issuerIdColumn);
    }

}
