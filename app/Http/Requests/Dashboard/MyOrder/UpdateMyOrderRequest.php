<?php

namespace App\Http\Requests\Dashboard\MyOrder;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Order;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;


class UpdateMyOrderRequest extends FormRequest
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
             'buyer_id' => ['nullable', 'integer'],
            'freelancer_id' => ['nullable', 'integer'],
            'file' => ['nullable', 'mimes:zip', 'max:1024'],
            'revision_time' => ['nullable', 'integer', 'max:100'],
            'expired' => ['nullable', 'date'],
            'note' => ['required', 'string', 'max:5000'],
            'order_status_id' => ['nullable', 'integer']
        ];
    }
}
