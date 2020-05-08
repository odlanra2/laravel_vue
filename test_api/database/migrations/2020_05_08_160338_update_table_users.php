<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\User;

class UpdateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        /*Schema::table('users', function(Blueprint $table){

        })*/

        $userExit = User::query()->where('email','arnaldolameda@gmail.com')->first('email');

        if(!$userExit){
            $user = new User();
            $user->email = "arnaldolameda@gmail.com";
            $user->password= Hash::make('arnaldo');
            $user->save();
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
    }
}
