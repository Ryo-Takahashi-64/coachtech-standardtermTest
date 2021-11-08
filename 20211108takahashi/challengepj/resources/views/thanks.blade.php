@extends('layouts.default')

@push('css')
  <link rel="stylesheet" href="{{asset('css/thanks.css')}}">
@endpush

@section('content')
  <div class="thanks__item">
    <p class="thanks__mssg">ご意見いただきありがとうおございました。</p>
    <button class="button__item">トップページへ</button>
  </div>
@endsection