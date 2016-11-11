<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50); 
            $table->string('content',500);
        });

        DB::table('websites')->insert(
            [
                [
                    'name' => 'title',
                    'content' => 'Tiêu đề website'
                ],
                [
                    'name' => 'meta_description',
                    'content' => 'website'
                ],
                [
                    'name' => 'meta_keywords',
                    'content' => 'keyword'
                ],
                [
                    'name' => 'hotline',
                    'content' => '01686539737'
                ],
                [
                    'name' => 'phone',
                    'content' => '01685554447'
                ],
                [
                    'name' => 'email',
                    'content' => 'dangcap@gmail.com'
                ],
                [
                    'name' => 'sdt_mua_hang_tu_xa',
                    'content' => '0168855447'
                ]
                ,
                [
                    'name' => 'sdt_trung_tam_bh',
                    'content' => '0155887779'
                ],
                [
                    'name' => 'sdt_dai_ly',
                    'content' => '0168885547'
                ]
                ,
                [
                    'name' => 'open_time',
                    'content' => 'Thứ 2 - thứ 7'
                ],
                [
                    'name' => 'gio_bao_hanh',
                    'content' => 'Thứ 2 - thứ 7'
                ]
                ,
                [
                    'name' => 'address',
                    'content' => 'địa chỉ'
                ],
                [
                    'name' => 'facebook',
                    'content' => 'facebook.com/'
                ],
                [
                    'name' => 'skype',
                    'content' => 'skype'
                ],
                [
                    'name' => 'twitter',
                    'content' => 'twitter'
                ],
                [
                    'name' => 'google',
                    'content' => 'google'
                ],
                [
                    'name' => 'copyright',
                    'content' => 'Copyright© 2015 Bản quyền thuộc về Dangcapdigital.vn'
                ],
                [
                    'name' => 'giay_phep',
                    'content' => 'GPKD số : 41C8012283 đăng ký ngày 26 tháng 3 năm 2010'
                ],
                [
                    'name' => 'twitter',
                    'content' => 'twitter.com/'
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
        Schema::drop('websites');
    }
}
