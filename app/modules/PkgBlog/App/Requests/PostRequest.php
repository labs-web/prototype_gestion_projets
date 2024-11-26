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
            'nom' => 'required',
            'description' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => __('validation.nomRequired'),
            'nom.max' => __('validation.nomMax'),
            'description.required' => __('validation.descriptionRequired'),
            'description.max' => __('validation.descriptionMax')
        ];
    }
}
