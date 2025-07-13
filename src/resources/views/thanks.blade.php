@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/form/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
  <div class="thanks__heading">
    <h2>お問い合わせありがとうございました</h2>
  </div>
  <div class="form__button">
      <a href="/" class="form__button-submit">HOME</a>
    </div>
</div>
@endsection