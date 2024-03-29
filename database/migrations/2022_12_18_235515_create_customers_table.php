<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string("dni")->unique();
            $table->string("name");
            $table->string("address");
            $table->string("address2")->nullable();
            $table->string("city");
            $table->string("phone")->unique();
            $table->string("phone2")->nullable()->unique();

            $table->foreignId("customer_types_id")->constrained("customer_types");
            
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
        Schema::dropIfExists('customers');
    }
};
