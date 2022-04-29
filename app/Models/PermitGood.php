<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermitGood extends Model
{
  use HasFactory, SoftDeletes;

  protected $guarded = [];

  /**
   * Get the permit that owns the PermitGood
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function permit()
  {
    return $this->belongsTo(Permit::class);
  }
}
