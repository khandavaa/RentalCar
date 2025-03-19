<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'RENTAL_DATE'    => 'required',
            'USER_ID'        => 'required',
            'USER_DEPT_NM'   => 'required',
            'RENTAL_PLACE_DESC'   => 'required',
            'RENTAL_ACTIVITY_CD'       => 'required',
            'RENTAL_EMP_QTY' => 'required|integer min:1',
            'RENTAL_USED_DESC'  => 'required',
            'PLAN_START_TIME'    => 'required',
            'PLAN_END_TIME'     => 'required',
            'DATA_MEMO'     => 'required'
             ];
    }
}
