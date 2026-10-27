<?php

use App\Models\Build;
use App\Models\Comment;
use App\Models\Hero;
use App\Models\Tag;
use App\Models\User;
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
        Schema::create('builds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Hero::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('build_image');
            $table->string('build_code');
            $table->foreignIdFor(Tag::class)->nullable()->constrained()->cascadeOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });

        Schema::table('builds', function (Blueprint $table) {
            $table->foreignIdFor(Comment::class)->nullable()->constrained()->cascadeOnDelete();
        });

        Schema::create('build_tag', function (Blueprint $table) {
            $table->foreignIdFor(Build::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('builds');
    }
};
