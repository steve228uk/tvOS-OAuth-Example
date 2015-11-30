@extends('main')

@section('content')

<div class="redirecting-container">
  <div class="logo"></div>

  <h3>Redirecting you to Put.io to authorise Fetch TV&hellip;</h3>
  <a class="btn" href="https://api.put.io/v2/oauth2/authenticate?client_id=2023&response_type=code&redirect_uri=http://getfetchapp.com/authenticate&state={{$token}}">Click here if you're not redirected</a>
  <meta http-equiv="refresh" content="3;https://api.put.io/v2/oauth2/authenticate?client_id=2023&response_type=code&redirect_uri=http://getfetchapp.com/authenticate&state={{$token}}">
</div>

@endsection
