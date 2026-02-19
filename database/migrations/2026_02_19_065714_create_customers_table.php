<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */

    // `vaccine`, `comment`, `emergency`, `sta_date`, `exp_date`, `expired`, `tenure`, `type_training`, `type_fighter`, `sponsored`, `commission`, `mealplan_month`, `affiliate`, `facebook`, `instagram`, `status`, `image`, `AddBy`, `code`, `status_code`, `date`
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('group');
            $table->string('m_card');
            $table->string('p_visa');
            $table->string('email');
            $table->string('phone');
            $table->string('sex');
            $table->string('fname');
            $table->string('price');
            $table->string('pay');
            $table->string('fightname');
            $table->string('nationalty');
            $table->string('birthday');
            $table->string('age');
            $table->string('discount');
            $table->string('vat7');
            $table->string('vat3');
            $table->string('total');
            $table->string('package');
            $table->string('dropin');
            $table->string('new_package');
            $table->string('height');
            $table->string('weigh');
            $table->string('accom');
            $table->string('payment');
            $table->string('invoice');
            $table->string('vaccine');
            $table->text('comment');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
