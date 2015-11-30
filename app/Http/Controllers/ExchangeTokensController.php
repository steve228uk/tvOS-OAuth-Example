<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ExchangeTokensRequest;
use App\Http\Controllers\Controller;
use App\Code;

class ExchangeTokensController extends Controller
{

    public function show($id) {
      $code = Code::where('token', $id)->first();
      if(!$code) return app()->abort(404);
      return $code;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ExchangeTokensRequest $request, $id)
    {

      $code = Code::where('token', $id)->first();
      if(!$code) {
        return response()->json(['error' => 'Not found'], 404);
      }

      $code->access_token = $request->get('access_token');
      $code->save();

      return ["success" => true];

    }

    public function destroy($id) {
      $code = Code::where('token', $id)->first();
      $code->delete();
      return ['success' => true];
    }

}
