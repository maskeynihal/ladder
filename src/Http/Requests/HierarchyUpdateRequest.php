<?php

namespace maskeynihal\ladder\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use maskeynihal\ladder\Rules\CannotBeOwnParentRule;
use maskeynihal\ladder\Rules\ShouldNotBeRootRule;

class HierarchyUpdateRequest extends FormRequest
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
            'title' => ['required', Rule::unique('hierarchies', 'title')->ignore($this->title, 'title')],
            'parent_id' => ['nullable','exists:hierarchies,hierarchy_id', new CannotBeOwnParentRule($this->title)]
        ];
    }
}
