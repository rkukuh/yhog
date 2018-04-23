<?php

namespace App\Http\Requests\Admin;

use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdate extends FormRequest
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
            'body' => 'required|min:5',
            'excerpt' => 'required|min:5',
            'category' => [
                'required',
                Rule::in(['yayasan-partner', 'event-partner']),
            ],
            'tag_id' => 'nullable|exists:tags,id',
            'images' => 'nullable',
            'images.*.image' => 'mimes:jpeg,png|min:50|max:1000',
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
            'body.required' => 'The content field is required.',
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

            if ($this['submit'] == 'draft') {

                $this->post->update(['previewed_at' => null]);
                $this->post->update(['published_at' => null]);

            } 
            else if ($this['submit'] == 'publish') {

                $this->post->update(['previewed_at' => null]);
                $this->post->update(['published_at' => Carbon::now()]);

            }
            else if ($this['submit'] == 'preview') {
                
                $this->merge(['previewed_at' => Carbon::now()]);
            }

        });
    }
}
