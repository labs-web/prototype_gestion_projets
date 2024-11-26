<?php
// Ce fichier est maintenu par ESSARRAJ Fouad



namespace Modules\PkgBlog\App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'user_id' => 'required',
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'published_at' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => __('validation.category_idRequired'),
            'category_id.max' => __('validation.category_idMax'),
            'user_id.required' => __('validation.user_idRequired'),
            'user_id.max' => __('validation.user_idMax'),
            'title.required' => __('validation.titleRequired'),
            'title.max' => __('validation.titleMax'),
            'content.required' => __('validation.contentRequired'),
            'content.max' => __('validation.contentMax'),
            'published_at.required' => __('validation.published_atRequired'),
            'published_at.max' => __('validation.published_atMax')
        ];
    }
}
