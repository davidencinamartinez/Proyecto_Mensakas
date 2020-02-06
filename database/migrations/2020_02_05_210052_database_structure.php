<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatabaseStructure extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('USERS', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('EMAIL',64)->unique();
            $table->string('PASSWORD');
            // $table->integer('ROLE'); // 1 (ADMIN) / 2 (BUSINESS) / 3 (DELIVERER) / 4 (CONSUMER)
            $table->rememberToken();
            // $table->string('LOCATION')->nullable();
        });

        Schema::create('CATEGORIES', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('NAME');
        });

        /*
        Schema::create('FRANCHISES', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->unsignedInteger('CATEGORY_ID');
            $table->foreign('CATEGORY_ID')->references('ID')->on('CATEGORIES');
            $table->string('FRANCHISE_NAME');
            $table->string('FRANCHISE_DESCRIPTION');
        });        
        */

        Schema::create('BUSINESSES', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->unsignedInteger('CATEGORY_ID');
            $table->foreign('CATEGORY_ID')->references('ID')->on('CATEGORIES');
            $table->string('BUS_NAME');
            $table->string('BUS_DESCRIPTION');
            $table->integer('POSTAL_CODE');
        });

        Schema::create('ITEMS', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->unsignedInteger('BUS_ID');
            $table->foreign('BUS_ID')->references('ID')->on('BUSINESSES');
            $table->string('ITEM_NAME');
            $table->string('ITEM_DESCRIPTION')->nullable();
            $table->float('PRICE', 5, 2);
            $table->boolean('ITEM_STATUS'); // ENABLED (1) / DISABLED (2)
        });

        Schema::create('EXTRAS', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->unsignedInteger('BUS_ID');
            $table->foreign('BUS_ID')->references('ID')->on('BUSINESSES');
            $table->string('EXTRA_NAME');
            $table->string('EXTRA_DESCRIPTION')->nullable();
            $table->boolean('EXTRA_STATUS'); // ENABLED (1) / DISABLED (2)
        });

        /*
        Schema::create('CARTS', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->unsignedInteger('USER_ID');
            $table->foreign('USER_ID')->references('ID')->on('USERS');
            $table->timestamp('CART_DATE');
            $table->string('ITEMS'); // ARRAY OF ITEMS (JSON)
            $table->string('EXTRAS')->nullable(); // ARRAY OF EXTRAS (JSON)
        });    
        */

        Schema::create('ORDERS', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->timestamp('ORDER_DATE');
            $table->unsignedInteger('CONSUMER_ID');
            $table->foreign('CONSUMER_ID')->references('ID')->on('USERS');
            $table->unsignedInteger('BUS_ID');
            $table->foreign('BUS_ID')->references('ID')->on('BUSINESSES');
            $table->string('ITEMS'); // ARRAY OF ITEMS (JSON)
            $table->string('EXTRAS')->nullable(); // ARRAY OF EXTRAS (JSON)
            $table->boolean('ORDER_STATUS'); // CONFIRMED (True) / NOT CONFIRMED (False)
            $table->timestamp('CONFIRMATION_TIME')->nullable();
            $table->string('COMMENTS')->nullable();
        });

        Schema::create('DELIVERIES', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->unsignedInteger('ORDER_ID');
            $table->foreign('ORDER_ID')->references('ID')->on('ORDERS');
            $table->unsignedInteger('DELIVERER_ID');
            $table->foreign('DELIVERER_ID')->references('ID')->on('USERS');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::dropIfExists('USERS');
        Schema::dropIfExists('CATEGORIES');
        // Schema::dropIfExists('FRANCHISES');
        Schema::dropIfExists('BUSINESSES');
        Schema::dropIfExists('ITEMS');
        Schema::dropIfExists('EXTRAS');
        // Schema::dropIfExists('CARTS');
        Schema::dropIfExists('ORDERS');
        // Schema::dropIfExists('DELIVERIES');
    }
}
