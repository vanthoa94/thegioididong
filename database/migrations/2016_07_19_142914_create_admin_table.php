<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('group_admins');
            $table->string('name',100);
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password',60);
            $table->string('phone',15);
            $table->dateTime('last_visit');
            $table->dateTime('after_last_visit');
            $table->tinyInteger('block'); //nếu bằng 1 thì là khóa
            $table->timestamps();
        });

        DB::table('admins')->insert(
            [
                [
                    'group_id' => 1,
                    'name'=>'Admin',
                    'username'=>'admin',
                    'email'=>'admin@gmail.com',
                    'password'=>bcrypt('admin'),
                    'phone'=>'01686539737',
                    'last_visit'=>'2016-07-19',
                    'after_last_visit'=>'2016-07-19',
                    'block'=>0
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admins');
    }
}
