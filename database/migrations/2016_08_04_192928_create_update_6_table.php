<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdate6Table extends Migration
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
                    'name' => 'background_color_menu',
                    'content' => '#000000'
                ],
                [
                    'name' => 'background_header',
                    'content' => '#ffffff'
                ],
                [
                    'name' => 'background_hover_menu',
                    'content' => '#FF0000'
                ],
                [
                    'name' => 'background_header_top',
                    'content' => '#000000'
                ],
                [
                    'name' => 'email_mua_hang_tu_xa',
                    'content' => 'email@gmail.com'
                ],
                [
                    'name' => 'email_trung_tam_bao_hanh',
                    'content' => 'email@gmail.com'
                ],
                [
                    'name' => 'email_dai_ly',
                    'content' => 'email@gmail.com'
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
