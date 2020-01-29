<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\User;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('name', 50);
            $table->string('lastname', 50)->nullable();
            $table->string('email', 50);
            $table->string('age', 50)->nullable();
            $table->string('biography', 500)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('avatar', 500)->default('/images/b3.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
