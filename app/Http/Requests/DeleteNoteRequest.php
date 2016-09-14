<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Note;

class DeleteNoteRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('delete', Note::find(request()->input('pk')));
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

}