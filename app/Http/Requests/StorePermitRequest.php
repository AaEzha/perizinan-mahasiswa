<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermitRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'user_id' => 'required|exists:users,id',
      'note' => 'required|string|max:255',
      'from_date' => 'required|date',
      'to_date' => 'required|date|after:from_date',
      'status' => 'required|in:approved,rejected',
      'address' => 'required',

      'description' => 'required',
      'quantity' => 'required|integer',
      'price' => 'required|numeric',
      'image' => 'required|image',
    ];
  }
}
