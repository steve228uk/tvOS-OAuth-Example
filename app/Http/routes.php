<?php

Route::resource('request-tv-token', 'TokenGenerationController', ['only' => ['store']]);
Route::resource('exchange-tokens', 'ExchangeTokensController', ['only' => ['show', 'update', 'destroy']]);

Route::get('{token}/complete', function ($token) {
    $code = App\Code::where('token', $token)->first();
    if($code) {
        $code->access_token = $_GET['access_token'];
        $code->save();
    }
    return view('complete');
});

Route::get('{id}', function ($id) {
  $code = App\Code::where('url', $id)->first();
  if(!$code) return app()->abort(404);
  return view('redirecting', ['token' => $code->token]);
});

Route::get('/', function () {
  return redirect('http://getfetchapp.com');
});
