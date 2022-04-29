<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('permits', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(User::class)->constrained();
      $table->date('from_date');
      $table->date('to_date');
      $table->string('note')->nullable();
      $table->string('address')->nullable();
      $table->string('status')->default('pending');
      $table->foreignId('admin_id')->nullable();
      $table->timestamp('responded_at')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('permits');
  }
};
