<?php

namespace App\Models;

use App\Enum\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permit extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'user_id',
    'from_date',
    'to_date',
    'note',
    'status',
    'admin_id',
    'responded_at',
  ];

  protected $dates = [
    'from_date',
    'to_date',
    'responded_at',
  ];

  /**
   * Get the user that owns the Permit
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the admin that owns the Permit
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function admin()
  {
    return $this->belongsTo(User::class, 'admin_id');
  }
}
