@extends('layouts.default')

@push('css')
  <link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endpush

@section('title','内容確認')

@section('content')
  <div class="form__item">
    <form action="/thanks" method="POST">
      <table>
        @csrf
        <tr>
          <th>
            <label for="name">
              お名前
            </label>
          </th>
          <td>
            <div class="name__item">
              <input type="text" name="fullname" id="fullname" class="input__item" value="{{$fullname}}" readonly="readonly">
              <input type="hidden" name="lastname" id="lastname" class="input__item" value="{{$lastname}}">
              <input type="hidden" name="firstname" id="firstname" class="input__item" value="{{$firstname}}">
            </div>
          </td>
        </tr>
        <tr>
          <th>
            <label for="gender">
              性別
            </label>
          </th>
          <td>
            @if ($gender == '1')
              <input type="text" name="gender" id="gender__male" class="input__item" value="男性" readonly="readonly">
              <input type="hidden" name="gender" id="gender__male" value="{{$gender}}">
            @elseif ($gender == '2')
              <input type="text" name="gender" id="gender__female" class="input__item" value="女性" readonly="readonly">
              <input type="hidden" name="gender" id="gender__female" value="{{$gender}}">
            @endif
          </td>
        </tr>
        <tr>
          <th>
            <label for="email">
              メールアドレス
            </label>
          </th>
          <td>
            <input type="email" name="email" id="email" class="input__item" value="{{$email}}" readonly="readonly">
          </td>
        </tr>
        <tr>
          <th>
            <label for="postcode">
              郵便番号
            </label>
          </th>
          <td>
            <input type="text" name="postcode" id="postcode" class="input__item" value="{{$postcode}}" readonly="readonly">
          </td>
        </tr>
        <tr>
          <th>
            <label for="address">
              住所
            </label>
          </th>
          <td>
            <input type="text" name="address" id="address" class="input__item" value="{{$address}}" readonly="readonly">
          </td>
        </tr>
        <tr>
          <th>
            <label for="building">
              建物名
            </label>
          </th>
          <td>
            <input type="text" name="building" id="building" class="input__item" value="{{$building}}" readonly="readonly">
          </td>
        </tr>
        <tr>
          <th>
            <label for="opinion">
              ご意見
            </label>
          </th>
          <td>
            <textarea name="opinion" id="opinion" class="textarea__item" cols="30" rows="4" readonly="readonly">{{$opinion}}</textarea>
          </td>
        </tr>
      </table>
      <button class="button__item">送信</button>
      <button class="button__reset" formaction ="/contact">修正する</button>
    </form>
  </div>
  <script src="{{asset('js/confirm.js')}}"></script>
@endsection