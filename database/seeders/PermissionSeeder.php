<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DB::table('permissions')->insert([
            ['id'=>1,'name' => 'Danh mục', 'display_name' => 'Danh mục','key_code' =>'', 'parent_id'=> 0],
            ['id'=>2,'name' => 'Danh sách danh mục', 'display_name' => 'Danh sách danh mục','key_code' =>'list_category', 'parent_id'=> 1],
            ['id'=>3,'name' => 'Thêm danh mục', 'display_name' => 'Thêm danh mục','key_code' =>'add_category', 'parent_id'=> 1],
            ['id'=>4,'name' => 'Sửa danh mục', 'display_name' => 'Sửa danh mục','key_code' =>'edit_category', 'parent_id'=> 1],
            ['id'=>5,'name' => 'Xoá danh mục', 'display_name' => 'Xoá danh mục','key_code' =>'delete_category', 'parent_id'=> 1],
            ['id'=>6,'name' => 'Menu', 'display_name' => 'Menu','key_code' =>'', 'parent_id'=> 0],
            ['id'=>7,'name' => 'Danh sách menu', 'display_name' => 'Danh sách menu','key_code' =>'list_menu', 'parent_id'=> 6],
            ['id'=>8,'name' => 'Thêm menu', 'display_name' => 'Thêm menu','key_code' =>'add_menu', 'parent_id'=> 6],
            ['id'=>9,'name' => 'Sửa menu', 'display_name' => 'Sửa menu','key_code' =>'edit_menu', 'parent_id'=> 6],
            ['id'=>10,'name' => 'Xoá menu', 'display_name' => 'Xoá menu','key_code' =>'delete_menu', 'parent_id'=> 6],
            ['id'=>11,'name' => 'Slider', 'display_name' => 'Slider','key_code' =>'', 'parent_id'=> 0],
            ['id'=>12,'name' => 'Danh sách slider', 'display_name' => 'Danh sách slider','key_code' =>'list_slider', 'parent_id'=> 11],
            ['id'=>13,'name' => 'Thêm slider', 'display_name' => 'Thêm slider','key_code' =>'add_slider', 'parent_id'=> 11],
            ['id'=>14,'name' => 'Sửa slider', 'display_name' => 'Sửa slider','key_code' =>'edit_slider', 'parent_id'=> 11],
            ['id'=>15,'name' => 'Xoá slider', 'display_name' => 'Xoá slider','key_code' =>'delete_slider', 'parent_id'=> 11],
            ['id'=>16,'name' => 'Sản phẩm', 'display_name' => 'Sản phẩm','key_code' =>'', 'parent_id'=> 0],
            ['id'=>17,'name' => 'Danh sách sản phẩm', 'display_name' => 'Danh sách sản phẩm','key_code' =>'list_product', 'parent_id'=> 16],
            ['id'=>18,'name' => 'Thêm sản phẩm', 'display_name' => 'Thêm sản phẩm','key_code' =>'add_product', 'parent_id'=> 16],
            ['id'=>19,'name' => 'Sửa sản phẩm', 'display_name' => 'Sửa sản phẩm','key_code' =>'edit_product', 'parent_id'=> 16],
            ['id'=>20,'name' => 'Xoá sản phẩm', 'display_name' => 'Xoá sản phẩm','key_code' =>'delete_product', 'parent_id'=> 16],
            ['id'=>21,'name' => 'Setting', 'display_name' => 'Setting','key_code' =>'', 'parent_id'=> 0],
            ['id'=>22,'name' => 'Danh sách setting', 'display_name' => 'Danh sách setting','key_code' =>'list_setting', 'parent_id'=> 21],
            ['id'=>23,'name' => 'Thêm setting', 'display_name' => 'Thêm setting','key_code' =>'add_setting', 'parent_id'=> 21],
            ['id'=>24,'name' => 'Sửa setting', 'display_name' => 'Sửa setting','key_code' =>'edit_setting', 'parent_id'=> 21],
            ['id'=>25,'name' => 'Xoá setting', 'display_name' => 'Xoá setting','key_code' =>'delete_setting', 'parent_id'=>21],
            ['id'=>26,'name' => 'Nhân viên', 'display_name' => 'Nhân viên','key_code' =>'', 'parent_id'=> 0],
            ['id'=>27,'name' => 'Danh sách nhân viên', 'display_name' => 'Danh sách nhân viên','key_code' =>'list_user', 'parent_id'=> 26],
            ['id'=>28,'name' => 'Thêm nhân viên', 'display_name' => 'Thêm nhân viên','key_code' =>'add_user', 'parent_id'=> 26],
            ['id'=>29,'name' => 'Sửa nhân viên', 'display_name' => 'Sửa nhân viên','key_code' =>'edit_user', 'parent_id'=>26],
            ['id'=>30,'name' => 'Xoá nhân viên', 'display_name' => 'Xoá nhân viên','key_code' =>'delete_user', 'parent_id'=> 26],
            ['id'=>31,'name' => 'Vai trò', 'display_name' => 'Vai trò','key_code' =>'', 'parent_id'=> 0],
            ['id'=>32,'name' => 'Danh sách vai trò', 'display_name' => 'Danh sách vai trò','key_code' =>'list_role', 'parent_id'=> 31],
            ['id'=>33,'name' => 'Thêm vai trò', 'display_name' => 'Thêm vai trò','key_code' =>'add_role', 'parent_id'=> 31],
            ['id'=>34,'name' => 'Sửa vai trò', 'display_name' => 'Sửa vai trò','key_code' =>'edit_role', 'parent_id'=> 31],
            ['id'=>35,'name' => 'Xoá vai trò', 'display_name' => 'Xoá vai trò','key_code' =>'delete_role', 'parent_id'=> 31],
        ]);
    }
}
