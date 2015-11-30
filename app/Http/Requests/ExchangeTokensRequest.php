<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ExchangeTokensRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      $secret = 'xxxxxxxxxxxxxxxx';
      return $this->input('secret') == $secret;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'secret' => 'required',
            'access_token' => 'required',
        ];
    }
}
