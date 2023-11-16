<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('system_user')) {
        Schema::create('system_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->unsignedBigInteger('user_group_id')->nullable();
            $table->foreign('user_group_id')->references('user_group_id')->on('system_user_group')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('branch_id')->on('core_branch')->onUpdate('cascade')->onDelete('set null');
            $table->string('username');
            $table->string('full_name')->nullable();
            $table->string('password');
            $table->dateTime('password_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->string('log_stat')->nullable();
            $table->boolean('branch_status')->default(0);
            $table->string('avatar')->nullable();
            $table->timestamps();
            $table->softDeletesTz();
        });
         // Insert admin user
        DB::table('system_user')->insert(array(
                'username' => 'administrator',
                'user_group_id' => 1,
                'branch_id' => 1,
                'email' => 'admin@email.com',
                'password'=>Hash::make('123456')
        ));
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('system_user');
    }
};
