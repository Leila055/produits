<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
       $rules= [
            'name' => 'required|string|min:5',
            'description' => 'required|string|min:10',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric' ,    ];
        if ($this-> route()->getActionMethod()==='create') {
             $rules['image']='required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'; }
             else {
                   $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';}
        return $rules;
    }
}
