**DerEffi/laravel-issuing** is a PHP package built for Laravel 5.*
to save creator last updator and deletor in database tables

[View on Packagist](https://packagist.org/packages/dereffi/issuing)

## VERSIONS

**This package is Laravel 5.8 compliant.**
Currentl Package version 0.1.0

## ABOUT

- [x] Easy add the columns `created_by`, `updated_by` and `deleted_by` in the migration files
- [x] Auto storing the data in mentioned columns on eloquent events
- [x] Auto adding relationships on the selected models
- [x] Easy customization over the config file

## INSTALLATION

This project can be installed via [Composer](http://getcomposer.org). To get
the latest version of the Issuing Package run the following command:

    composer require dereffi/issuing

After the installation you can run following command to publish the config file

    php artisan vendor:publish --tag=dereffi-issuing

## Usage

#### CONFIGURATION
The model representing the `Issuer` must implement the authenticatable
interface `Illuminate\Contracts\Auth\Authenticatable` *(or any child of it)*
which is the default with the Eloquent `User` model.

Easy Configuration of the `Issuer` Model and the database column in the config file `issuing.php`

#### Migrations

To auto create the `*_by` columns to migration tables you have to call the `IssuerColumns` class
anywhere in the `Schema::create` function with the `$table` as parameter.
The names of the columns can be changed in the `config/issuing.php` file. If you do so
you have to refresh the migration or do it bevor you migrate your tables.

Following exaple with the default laravel users migration file:

    <?php

    use Dereffi\Issuing\IssuerColumns;              // <-- Import

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateUsersTable extends Migration
    {
        /**
        * Run the migrations.
        *
        * @return void
        */
        public function up()
        {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();

                IssuerColumns::create($table);      // <-- auto adding the columns

            });
        }

        /**
        * Reverse the migrations.
        *
        * @return void
        */
        public function down()
        {
            Schema::dropIfExists('users');
        }
    }


#### Models

To auto save the issuer id with the element on creating, updationg or deleting you have to use
the `Dereffi\Issuing\Issuable` Trait in the model files like the following example with the default laravel
User Model:

    <?php

    namespace App;

    use Dereffi\Issuing\Issuable;               // <-- add this line to Import the Trait

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class User extends Authenticatable
    {
        use Notifiable, Issuable;               // <-- add the Issuable Trait to the Model


## LICENSE

Laravel User Verification is licensed under [The MIT License (MIT)](LICENSE).
