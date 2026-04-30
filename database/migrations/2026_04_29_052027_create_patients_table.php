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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            // Core Patient Info
            $table->string('full_name');
            $table->integer('age');
            $table->string('gender', 15);
            $table->string('contact_number', 20);

            // Relationships to your existing tables
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('subtype_id')->nullable();

            // Medical/Admin Essentials
            $table->string('department');
            $table->string('doctor_assigned');
            $table->string('room_number', 10)->nullable();
            $table->string('status')->default('Admitted');

            // Logistics
            $table->decimal('bill_amount', 10, 2)->default(0.00);
            $table->dateTime('admission_date')->useCurrent();
            $table->dateTime('discharge_date')->nullable();

            $table->timestamps();

            // Foreign Key Constraints
            // Replace 'patient_types' and 'patient_subtypes' with your actual table names
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('subtype_id')->references('id')->on('subtypes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
