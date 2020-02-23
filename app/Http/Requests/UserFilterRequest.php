<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserFilterRequest extends FormRequest
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
            //
        ];
    }

    public function filters()
    {
        return [
            's' => $this->getSearchTerm(),
            'sort' => $this->getSort(),
        ];
    }

    protected function getSearchTerm()
    {
        return $this->has('s') ? trim($this->s) : null;
    }

    protected function getSort()
    {
        return $this->has('sort') ? trim($this->sort) : null;
    }
}
