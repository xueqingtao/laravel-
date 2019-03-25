<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *权限表
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fid')->default(0)->comment('父类id');
            $table->string('name',50)->comment('权限名字');
            $table->string('url',80)->comment('权限的url地址');
            $table->enum('is_enum',['1','2'])->default('1')->comment('是否显示菜单 1否  2 是');
            $table->integer('sort')->default('sort')->default(100)->comment('权限的排序');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
