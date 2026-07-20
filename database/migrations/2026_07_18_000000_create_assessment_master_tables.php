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
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('type', ['education', 'corporate']);
            $table->json('settings')->nullable();
            $table->timestamps();
        });

        Schema::create('frameworks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('theoretical_basis')->nullable();
            $table->enum('context', ['education', 'corporate', 'both'])->default('both');
            $table->string('version')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });

        Schema::create('constructs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('framework_id')->nullable()->constrained('frameworks')->nullOnDelete();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->enum('level', ['construct', 'dimension', 'indicator']);
            $table->string('code')->unique();
            $table->string('name');
            $table->text('conceptual_definition')->nullable();
            $table->text('operational_definition')->nullable();
            $table->enum('direction', ['unidimensional', 'index'])->nullable();
            $table->string('version')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();

            $table->index('level');
        });

        Schema::create('instruments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('organization_id')->nullable()->constrained('organizations')->nullOnDelete();
            $table->string('name');
            $table->enum('purpose', ['selection', 'diagnostic', 'talent_mgmt']);
            $table->enum('response_model', ['dichotomous', 'polytomous', 'mixed']);
            $table->enum('default_irt_model', ['rasch', '2pl', '3pl', '4pl', 'grm', 'pcm']);
            $table->enum('delivery_default', ['linear', 'cat', 'polycat', 'questionnaire']);
            $table->string('version')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });

        Schema::create('blueprints', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('instrument_id')->constrained('instruments')->cascadeOnDelete();
            $table->string('name');
            $table->string('version')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });

        Schema::create('blueprint_cells', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('blueprint_id')->constrained('blueprints')->cascadeOnDelete();
            $table->foreignId('construct_id')->constrained('constructs');
            $table->string('cognitive_level')->nullable();
            $table->unsignedInteger('target_item_count');
            $table->decimal('target_difficulty_min', 8, 2)->nullable();
            $table->decimal('target_difficulty_max', 8, 2)->nullable();
            $table->decimal('weight', 8, 2)->default(1);
            $table->timestamps();
        });

        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('instrument_id')->constrained('instruments')->cascadeOnDelete();
            $table->string('name');
            $table->enum('form_type', ['linear', 'cat_pool', 'mst']);
            $table->boolean('is_operational')->default(false);
            $table->string('version')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });

        Schema::table('constructs', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('constructs')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('constructs', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
        });

        Schema::dropIfExists('forms');
        Schema::dropIfExists('blueprint_cells');
        Schema::dropIfExists('blueprints');
        Schema::dropIfExists('instruments');
        Schema::dropIfExists('constructs');
        Schema::dropIfExists('frameworks');
        Schema::dropIfExists('organizations');
    }
};
