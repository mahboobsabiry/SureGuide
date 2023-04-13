<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('answer');
            $table->unsignedBigInteger('industry_id');
            $table->timestamps();
            $table->foreign('industry_id')->references('id')->on('business_industries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_opportunities');
    }
}
