<?php

namespace DerEffi\Issuing\Helper;

use Illuminate\Database\Schema\Blueprint;

class IssuerColumns {

    public function __contruct(Blueprint &$table) {

        $issuerTable = config('issuing.table');
        $issuerIdColumn = config('issuing.column');
        $creatorColumn = config('issuing.creator_column');
        $updatorColumn = config('issuing.updator_column');
        $deletorColumn = config('issuing.deletor_column');

        $table->unsignedInteger($creatorColumn)->nullable();
        $table->foreign($creatorColumn)->references($issuerIdColumn)->on($issuerTable);

        $table->unsignedInteger($updatorColumn)->nullable();
        $table->foreign($updatorColumn)->references($issuerIdColumn)->on($issuerTable);

        $table->unsignedInteger($deletorColumn)->nullable();
        $table->foreign($deletorColumn)->references($issuerIdColumn)->on($issuerTable);

    }

}
