<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_no')->unique(); // 'tracking_no' rakhen jo humne controller mein likha tha
            $table->string('sender_name');
            $table->string('receiver_name');
            $table->string('from_city');
            $table->string('to_city');
            $table->decimal('price', 10, 2);
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('couriers');
    }
}
