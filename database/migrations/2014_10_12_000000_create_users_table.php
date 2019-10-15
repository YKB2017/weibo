<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name')->comment('用户名');
            $table->string('email')->unique()->comment('邮箱');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱验证的时间');
            $table->string('password')->comment('用户密码');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('is_admin')->default(false)->comment('是否为管理员');
            $table->string('activation_token')->nullable()->comment('邮箱验证码');
            $table->boolean('activated')->default(false)->comment('邮箱是否验证');
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
