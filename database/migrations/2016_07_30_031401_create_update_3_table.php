<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdate3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("alter table users drop index users_email_unique;");
        DB::statement("alter table products drop index products_pro_code_unique;");

        DB::table('websites')->insert(
            [
                [
                    'name' => 'background_image',
                    'content' => 'image'
                ],
                [
                    'name' => 'background_color',
                    'content' => '#fff'
                ],
                [
                    'name' => 'background_menu',
                    'content' => 'image'
                ],
                [
                    'name' => 'background_footer',
                    'content' => '#101010'
                ],
                [
                    'name' => 'background_body',
                    'content' => '#fff'
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
        //Schema::drop('User');
    }
}
