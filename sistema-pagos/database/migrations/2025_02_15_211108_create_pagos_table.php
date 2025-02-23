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
             Schema::create('pagos', function (Blueprint $table) {
                $table->id();
                $table->foreignId('empleado_id')->constrained()->onDelete('cascade');
                $table->decimal('monto', 8, 2);
                $table->decimal('descuento', 5, 2)->default(0);
                $table->decimal('prestamo', 8, 2)->default(0);
                $table->decimal('total_pagar', 8, 2);
                $table->timestamps();
              });
           }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
