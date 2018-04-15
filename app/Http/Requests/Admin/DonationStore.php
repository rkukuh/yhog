<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DonationStore extends FormRequest
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
            'target' => 'numeric|min:0',
            'end_at' => 'nullable|date_format:"d/m/Y"|after_or_equal:today',
            'description' => 'required|min:5',
            'location' => 'nullable|min:5|max:255',
            'images' => 'nullable',
            'images.*.image' => 'mimes:jpeg,png|min:50|max:1000',
            'video_url' => 'nullable|url',
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
            'tag_id.required' => 'The tag field is required.',
            'target.min' => 'The target amount must be at least 0.',
            'end_at.after_or_equal' => 'The deadline must be a date after or equal to today.',
            'video_url.url' => 'The video url format is invalid. You may want to upload the video to YouTube first.',
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
                
                'end_at' => ($this->end_at) ? 
                            Carbon::createFromFormat('d/m/Y', $this->end_at) : null,

            ]);
            
        });
    }
}
