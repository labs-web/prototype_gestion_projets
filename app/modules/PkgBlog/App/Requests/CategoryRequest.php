<?php
// Ce fichier est maintenu par ESSARRAJ Fouad



namespace Modules\PkgBlog\App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'nullable|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('validation.nameRequired'),
            'name.max' => __('validation.nameMax'),
            'description.required' => __('validation.descriptionRequired'),
            'description.max' => __('validation.descriptionMax')
        ];
    }
}
