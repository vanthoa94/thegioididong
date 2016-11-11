<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdate5Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('websites')->where('name','background_image')->update(['content'=>'/public/kingtech/images/scroll.png']);
        DB::table('websites')->where('name','background_menu')->update(['content'=>'/public/kingtech/images/menu.png']);
    
        DB::table('group_role')->insert(
            [
                [
                    'name' => 'Quản lý sản phẩm'
                ],
                [
                    'name' => 'Quản lý menu'
                ],
                [
                    'name' => 'Quản lý tin tức'
                ],
                [
                    'name' => 'Quản lý trang'
                ],
                [
                    'name' => 'Quản lý loại sản phẩm'
                ],
                [
                    'name' => 'Quản lý loại tin tức'
                ],
                [
                    'name' => 'Quản lý slide'
                ],
                [
                    'name' => 'Quản lý quảng cáo'
                ],
                [
                    'name' => 'Quản lý ứng dụng'
                ],
                [
                    'name' => 'Quản lý loại ứng dụng'
                ],
                [
                    'name' => 'Quản lý video'
                ],
                [
                    'name' => 'Quản lý chi nhánh'
                ],
                [
                    'name' => 'Quản lý đại lý'
                ],
                [
                    'name' => 'Quản lý hỗ trợ'
                ],
                [
                    'name' => 'Quản lý tag'
                ],
                [
                    'name' => 'Quản lý admin'
                ],
                [
                    'name' => 'Quản lý người dùng'
                ],
                [
                    'name' => 'Quản lý website'
                ]
            ]
        );

        DB::table('roles')->insert(
            [
                [
                    'group_id' => 8,
                    'name' => 'Xem danh sách',
                    'key'=>'ad/list'
                ],
                [
                    'group_id' => 8,
                    'name' => 'Thêm',
                    'key'=>'ad/create'
                ],
                [
                    'group_id' => 8,
                    'name' => 'Sửa',
                    'key'=>'ad/update'
                ],
                [
                    'group_id' => 8,
                    'name' => 'Xóa',
                    'key'=>'ad/delete'
                ],
                [
                    'group_id' => 16,
                    'name' => 'Xem danh sách',
                    'key'=>'admin/list'
                ],
                [
                    'group_id' => 16,
                    'name' => 'Thêm',
                    'key'=>'admin/create'
                ],
                [
                    'group_id' => 16,
                    'name' => 'Sửa',
                    'key'=>'admin/update'
                ],
                [
                    'group_id' => 16,
                    'name' => 'Xóa',
                    'key'=>'admin/delete'
                ],
                [
                    'group_id' => 16,
                    'name' => 'Mở khóa / Khóa',
                    'key'=>'admin/block'
                ],
                [
                    'group_id' => 16,
                    'name' => 'Reset pass',
                    'key'=>'admin/reset'
                ],
                [
                    'group_id' => 13,
                    'name' => 'Xem danh sách',
                    'key'=>'agency/list'
                ],
                [
                    'group_id' => 13,
                    'name' => 'Thêm',
                    'key'=>'agency/create'
                ],
                [
                    'group_id' => 13,
                    'name' => 'Sửa',
                    'key'=>'agency/update'
                ],
                [
                    'group_id' => 13,
                    'name' => 'Xóa',
                    'key'=>'agency/delete'
                ],
                [
                    'group_id' => 10,
                    'name' => 'Xem danh sách',
                    'key'=>'appcate/list'
                ],
                [
                    'group_id' => 10,
                    'name' => 'Thêm',
                    'key'=>'appcate/create'
                ],
                [
                    'group_id' => 10,
                    'name' => 'Sửa',
                    'key'=>'appcate/update'
                ],
                [
                    'group_id' => 10,
                    'name' => 'Xóa',
                    'key'=>'appcate/delete'
                ],
                [
                    'group_id' => 9,
                    'name' => 'Xem danh sách',
                    'key'=>'app/list'
                ],
                [
                    'group_id' => 9,
                    'name' => 'Thêm',
                    'key'=>'app/create'
                ],
                [
                    'group_id' => 9,
                    'name' => 'Sửa',
                    'key'=>'app/update'
                ],
                [
                    'group_id' => 9,
                    'name' => 'Xóa',
                    'key'=>'app/delete'
                ],
                [
                    'group_id' => 12,
                    'name' => 'Xem danh sách',
                    'key'=>'branch/list'
                ],
                [
                    'group_id' => 12,
                    'name' => 'Thêm',
                    'key'=>'branch/create'
                ],
                [
                    'group_id' => 12,
                    'name' => 'Sửa',
                    'key'=>'branch/update'
                ],
                [
                    'group_id' => 12,
                    'name' => 'Xóa',
                    'key'=>'branch/delete'
                ],
                [
                    'group_id' => 5,
                    'name' => 'Xem danh sách',
                    'key'=>'category/list'
                ],
                [
                    'group_id' => 5,
                    'name' => 'Thêm',
                    'key'=>'category/create'
                ],
                [
                    'group_id' => 5,
                    'name' => 'Sửa',
                    'key'=>'category/update'
                ],
                [
                    'group_id' => 5,
                    'name' => 'Xóa',
                    'key'=>'category/delete'
                ],
                [
                    'group_id' => 18,
                    'name' => 'Xem',
                    'key'=>'info/list'
                ],
                [
                    'group_id' => 18,
                    'name' => 'Cập nhật',
                    'key'=>'info/update'
                ],
                [
                    'group_id' => 2,
                    'name' => 'Xem danh sách',
                    'key'=>'menu/list'
                ],
                [
                    'group_id' => 2,
                    'name' => 'Thêm',
                    'key'=>'menu/create'
                ],
                [
                    'group_id' => 2,
                    'name' => 'Sửa',
                    'key'=>'menu/update'
                ],
                [
                    'group_id' => 2,
                    'name' => 'Xóa',
                    'key'=>'menu/delete'
                ],
                [
                    'group_id' => 6,
                    'name' => 'Xem danh sách',
                    'key'=>'newscate/list'
                ],
                [
                    'group_id' => 6,
                    'name' => 'Thêm',
                    'key'=>'newscate/create'
                ],
                [
                    'group_id' => 6,
                    'name' => 'Sửa',
                    'key'=>'newscate/update'
                ],
                [
                    'group_id' => 6,
                    'name' => 'Xóa',
                    'key'=>'newscate/delete'
                ],
                [
                    'group_id' => 3,
                    'name' => 'Xem danh sách',
                    'key'=>'news/list'
                ],
                [
                    'group_id' => 3,
                    'name' => 'Thêm',
                    'key'=>'news/create'
                ],
                [
                    'group_id' => 3,
                    'name' => 'Sửa',
                    'key'=>'news/update'
                ],
                [
                    'group_id' => 3,
                    'name' => 'Xóa',
                    'key'=>'news/delete'
                ],
                [
                    'group_id' => 4,
                    'name' => 'Xem danh sách',
                    'key'=>'page/list'
                ],
                [
                    'group_id' => 4,
                    'name' => 'Thêm',
                    'key'=>'page/create'
                ],
                [
                    'group_id' => 4,
                    'name' => 'Sửa',
                    'key'=>'page/update'
                ],
                [
                    'group_id' => 4,
                    'name' => 'Xóa',
                    'key'=>'page/delete'
                ],
                [
                    'group_id' => 1,
                    'name' => 'Xem danh sách',
                    'key'=>'product/list'
                ],
                [
                    'group_id' => 1,
                    'name' => 'Thêm',
                    'key'=>'product/create'
                ],
                [
                    'group_id' => 1,
                    'name' => 'Sửa',
                    'key'=>'product/update'
                ],
                [
                    'group_id' => 1,
                    'name' => 'Xóa',
                    'key'=>'product/delete'
                ],
                [
                    'group_id' => 7,
                    'name' => 'Xem danh sách',
                    'key'=>'slide/list'
                ],
                [
                    'group_id' => 7,
                    'name' => 'Thêm',
                    'key'=>'slide/create'
                ],
                [
                    'group_id' => 7,
                    'name' => 'Sửa',
                    'key'=>'slide/update'
                ],
                [
                    'group_id' => 7,
                    'name' => 'Xóa',
                    'key'=>'slide/delete'
                ],
                [
                    'group_id' => 14,
                    'name' => 'Xem danh sách',
                    'key'=>'support/list'
                ],
                [
                    'group_id' => 14,
                    'name' => 'Thêm',
                    'key'=>'support/create'
                ],
                [
                    'group_id' => 14,
                    'name' => 'Sửa',
                    'key'=>'support/update'
                ],
                [
                    'group_id' => 14,
                    'name' => 'Xóa',
                    'key'=>'support/delete'
                ],
                [
                    'group_id' => 15,
                    'name' => 'Xem danh sách',
                    'key'=>'tag/list'
                ],
                [
                    'group_id' => 15,
                    'name' => 'Thêm',
                    'key'=>'tag/create'
                ],
                [
                    'group_id' => 15,
                    'name' => 'Sửa',
                    'key'=>'tag/update'
                ],
                [
                    'group_id' => 15,
                    'name' => 'Xóa',
                    'key'=>'tag/delete'
                ],
                [
                    'group_id' => 17,
                    'name' => 'Xem danh sách',
                    'key'=>'user/list'
                ],
                [
                    'group_id' => 17,
                    'name' => 'Thêm',
                    'key'=>'user/create'
                ],
                [
                    'group_id' => 17,
                    'name' => 'Sửa',
                    'key'=>'user/update'
                ],
                [
                    'group_id' => 17,
                    'name' => 'Xóa',
                    'key'=>'user/delete'
                ],
                [
                    'group_id' => 17,
                    'name' => 'Mở khóa / Khóa',
                    'key'=>'user/block'
                ],
                [
                    'group_id' => 17,
                    'name' => 'Reset pass',
                    'key'=>'user/reset'
                ],
                [
                    'group_id' => 11,
                    'name' => 'Xem danh sách',
                    'key'=>'video/list'
                ],
                [
                    'group_id' => 11,
                    'name' => 'Thêm',
                    'key'=>'video/create'
                ],
                [
                    'group_id' => 11,
                    'name' => 'Sửa',
                    'key'=>'video/update'
                ],
                [
                    'group_id' => 11,
                    'name' => 'Xóa',
                    'key'=>'video/delete'
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
