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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->foreignIdFor(App\Models\User::class, 'id_supervisor');
            $table->foreignIdFor(App\Models\Driver::class, 'id_driver');
            $table->text('note')->nullable();
            $table->foreignIdFor(App\Models\vechile::class, 'id_vechile');
            $table->double('fuel_usage')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
