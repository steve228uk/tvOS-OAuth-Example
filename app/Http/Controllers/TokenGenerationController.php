<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TVTokenRequest;
use App\Http\Controllers\Controller;
use App\Code;

class TokenGenerationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TVTokenRequest $request)
    {
      return $this->generateCodes();
    }

    private function generateCodes()
    {
      $url = str_random(5);
      $token = str_random(32);

      if(Code::where('url', $url)->orWhere('token', $token)->count() > 0) {
        return $this->generateCodes();
      }

      $code = new Code();
      $code->url = $url;
      $code->token = $token;
      $code->save();

      return [
          "token" => $token,
          "url" => "https://ftch.in/$url"
      ];
    }

}
