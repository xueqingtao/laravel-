<?php

use Illuminate\Database\Seeder;

class InitPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //插入首页
        DB::table('permissions')->insert([
            'fid'=>0,
            'name'=>'首页',
            'url'=>'admin.home',
            'is_enum'=>'1'
    ]);

//插入系统设置
        DB::table('permissions')->insert([
            'fid'=>0,
            'name'=>'系统设置',
            'url'=>'#',
            'is_enum'=>'1'
        ]);
//插入权限列表
        DB::table('permissions')->insert([
            'fid'=>2,
            'name'=>'权限列表',
            'url'=>'admin.permission.list',
            'is_enum'=>'1'
        ]);


    //插入权限添加页面
            DB::table('permissions')->insert([
            'fid'=>2,
            'name'=>'权限添加',
            'url'=>'admin.permission.create',
            'is_enum'=>'1'
            ]);

        //执行权限添加页面
        DB::table('permissions')->insert([
            'fid'=>2,
            'name'=>'执行权限添加',
            'url'=>'admin.permission.doCreate',
            'is_enum'=>'2'
        ]);
    }
}
