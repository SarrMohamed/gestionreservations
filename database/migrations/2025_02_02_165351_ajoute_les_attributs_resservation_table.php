<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reservation', function (Blueprint $table) {
            $table->integer('nombrePlace');
            $table->decimal('prix');
            $table->date('date');
            $table->integer('evenement_id');
            $table->foreign('evenement_id')->references('id')->on('evenement');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservation', function (Blueprint $table) {
            $table->dropColumn('nombrePlace');
            $table->dropColumn('prix');
            $table->dropColumn('date');
            $table->dropColumn('evenement_id');

        });
    }
};
