<?php

return [

    /*
     *  Defines where the authenticated users are saved in the database
     *  The idColumn represents the primary key (unsignedInteger) of the issuer table
     *  The creator_column / creator_column / creator_column are used to save and retrive the data to and from the database
     *
     *  This information is used to create the Issuer columns in the issued tables in the migration files
     *  and to set up the eloquent events and model relationships
     *
     *  Defaults:
     *
     *      'table' => 'user',
     *      'idColumn' => 'id',
     *
     *      'creator_column' => 'created_by',
     *      'updator_column' => 'updated_by',
     *      'deletor_column' => 'deleted_by',
     *
     */

    'table' => 'user',
    'id_column' => 'id',

    'creator_column' => 'created_by',
    'updator_column' => 'updated_by',
    'deletor_column' => 'deleted_by',

    /*
     *  Defines the model of the authenticated users
     *
     *  This information is used to auto create relationships on the other issued models
     *
     *  Defaults:
     *
     *      'model' => App\Users::class
     *
     */

    'model' => App\Users::class

];
