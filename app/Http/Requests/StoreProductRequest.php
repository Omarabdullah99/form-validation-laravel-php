<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string| min:5|max:50',
            'price'=>'required|numeric|min:3.0|max:100.0',
            'description'=>'required|string|',
            'stock' => 'required|boolean',
            'product_image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages():array
    {
      return[
         'name.min' => 'প্রোডাক্টের নাম কমপক্ষে ৫ অক্ষরের হতে হবে।',
         'name.required'=> 'প্রোডাক্টের নাম দিতে হবে, না হলে তৈরি (create) করতে দেওয়া হবে না।'
      ];
    }
}
