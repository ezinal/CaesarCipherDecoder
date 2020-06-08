<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Cipher;

class CreateCiphersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciphers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cipher');
            $table->integer('shift_number')->default(13);
            $table->boolean('decode_option')->default(true);
            $table->timestamps();
        });

        Cipher::create([
            'cipher' => 'abc',
            'shift_number' => 13,
            'decode_option' => true
        ]);

        Cipher::create([
            'cipher' => 'klm',
            'shift_number' => 13,
            'decode_option' => true
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciphers');
    }
}
