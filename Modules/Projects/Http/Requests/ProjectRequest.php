<?php

namespace Modules\Projects\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Projects\Entities\ProjectStatus;

class ProjectRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'description' => [
                'required',
                'string',
            ],
            'project_status_id' => [
                'nullable',
                Rule::in(ProjectStatus::getStatusesIds()),
            ],
        ];
    }
}
