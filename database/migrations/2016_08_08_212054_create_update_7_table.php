<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdate7Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('websites')->insert(
            [
                [
                    'name' => 'background_center_support',
                    'content' => '#e61214'
                ],
                [
                    'name' => 'icon_mua_hang_tu_xa',
                    'content' => '/public/kingtech/images/icon/1-trung-tam.png'
                ],
                [
                    'name' => 'icon_trung_tam_bao_hanh',
                    'content' => '/public/kingtech/images/icon/2-trung-tam.png'
                ],
                [
                    'name' => 'icon_dai_ly',
                    'content' => '/public/kingtech/images/icon/3-trung-tam.png'
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
        // Schema::table('user', function (Blueprint $table) {
        //     //
        // });
    }
}
