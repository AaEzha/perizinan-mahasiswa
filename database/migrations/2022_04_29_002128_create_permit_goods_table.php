<?php

use App\Models\Permit;
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
    Schema::create('permit_goods', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(Permit::class)->constrained();
      $table->text('description');
      $table->integer('quantity');
      $table->string('price');
      $table->string('image')->nullable();
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
    Schema::dropIfExists('permit_goods');
  }
};
