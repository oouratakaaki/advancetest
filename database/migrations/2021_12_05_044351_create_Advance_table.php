<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('first_name', 225)->comment('お名前');
            $table->string('last_name', 225)->comment('お名前');
            $table->tinyInteger('gender')->unsigned()->comment('性別 : 1 : 男性 2 : 女性');
            $table->string('email', 255)->comment('メールアドレス');
            $table->string('postcode', `[1-9]{3}-[0-9]{4}`)->nullable(false)->comment('郵便番号');
            $table->string('address', 255)->nullable(false)->comment('住所');
            $table->string('building_name', 255)->comment('建物名');
            $table->text('opinion', 120)->nullable(false)->comment('ご意見');
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
