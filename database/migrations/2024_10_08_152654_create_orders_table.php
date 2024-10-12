<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('customer_id');
        $table->string('status');
        $table->decimal('total_amount', 10, 2);
        $table->timestamps();

        // Foreign Key Constraint
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('orders');
}

};
