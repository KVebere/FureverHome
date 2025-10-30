<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_adopt_feedback', function (Blueprint $table) {
            $table->id('feedback_id');
            $table->unsignedBigInteger('adoption_app_id');
            $table->foreign('adoption_app_id')
                ->references('adoption_app_id')
                ->on('adoption_apps')
                ->cascadeOnDelete();
            $table->text('feedback_comments');
            $table->date('feedback_date');
            $table->unsignedTinyInteger('satisfaction_rating');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE post_adopt_feedback ADD CONSTRAINT rating_check CHECK (satisfaction_rating >= 1 AND satisfaction_rating <= 5);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_adopt_feedback');
    }
};
