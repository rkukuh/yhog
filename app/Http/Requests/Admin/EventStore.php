<?php

namespace App\Http\Requests\Admin;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class EventStore extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'price' => 'numeric|min:0',
            'size' => 'numeric|min:0',
            'location' => 'nullable|min:5|max:255',
            'description' => 'nullable|min:5',
            'category_id' => 'required|exists:categories,id',
            'tag_id' => 'nullable|exists:tags,id',
            'start_at' => 'required|date_format:"d/m/Y"|after_or_equal:today',
            'end_at' => 'required|date_format:"d/m/Y"|after_or_equal:start_at',
            'early_bird_price' => 'numeric|min:0',
            'early_bird_price_end_at' => 'nullable|date_format:"d/m/Y"|before_or_equal:start_at',
            // 'images' => 'required',
            'images.*.image' => 'mimes:jpeg,png|min:50|max:1000'
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
            'tag_id.required' => 'The tag field is required.'
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

            $this->merge([

                'user_id' => auth()->user()->id,

                'start_at' => Carbon::createFromFormat('d/m/Y', $this->start_at),
                'end_at' => Carbon::createFromFormat('d/m/Y', $this->end_at),

                'early_bird_price_end_at' => ($this->early_bird_price_end_at) ? 
                                                Carbon::createFromFormat('d/m/Y', $this->early_bird_price_end_at) : 
                                                null
            ]);
            
        });
    }
}
