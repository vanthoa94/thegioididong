<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsOnlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics_online', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id2',8);
            $table->integer('quantity');
            $table->tinyInteger('mday');
        });

        DB::statement("INSERT INTO admin_group_role(group_id,role_id) SELECT 1 as group_id, roles.id as role_id FROM roles");
        DB::table('group_role')->insert(
            [
                [
                    'name' => 'Quản lý nhóm admin'
                ]
            ]
        );

        DB::table('roles')->insert(
            [
                [
                    'group_id' => 19,
                    'name' => 'Xem danh sách',
                    'key'=>'groupadmin/list'
                ],
                [
                    'group_id' => 19,
                    'name' => 'Thêm',
                    'key'=>'groupadmin/create'
                ],
                [
                    'group_id' => 19,
                    'name' => 'Sửa',
                    'key'=>'groupadmin/update'
                ],
                [
                    'group_id' => 19,
                    'name' => 'Xóa',
                    'key'=>'groupadmin/delete'
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
        Schema::drop('statistics_online');
    }
}
