<?php

namespace App\Http\Requests\Admin;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class GalleryStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:100',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|min:5',
            'images' => 'required',
            'images.*.image' => 'mimes:jpeg,png|min:50|max:2000',
            'tag_id' => 'nullable|exists:tags,id',
        ];
    }

    /**
     * Set custom validation error message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.required' => 'The category field is required.',
            'images.required' => 'The images field is required.',
            'tag_id.required' => 'The tag field is required.',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $this->merge(['creator_id' => auth()->user()->id]);

            if ($this['submit'] == 'draft') {

                $this->merge(['published_at' => null]);
            } 
            else if ($this['submit'] == 'publish') {

                $this->merge(['published_at' => Carbon::now()]);
            }
            
        });
    }
}
