@extends('layouts.default')

@push('css')
  <link rel="stylesheet" href="{{asset('css/contact.css')}}">
@endpush

@section('title','お問い合わせ')

@section('content')
  <div class="form__item">
    <form action="/confirm" method="POST">
      <table>
        @csrf
        <tr>
          <th>
            <label for="name" class="required__title">
              お名前
            </label>
          </th>
          <td>
            <div class="name__item">
              <div class="input__item__name">
                @isset ($lastname)
                  <input type="text" name="lastname" id="lastname" class="input__item" value="{{$lastname}}" onblur="chkLastName(this);">
                @else
                  <input type="text" name="lastname" id="lastname" class="input__item" onblur="chkLastName(this);">
                @endisset
                @if ($errors->has('lastname'))
                  <p id="err__lastname" class="err__text">{{$errors->first('lastname')}}</p>
                @else
                  <p id="err__lastname" class="err__text"></p>
                @endif
                <p class="placeholder">例）山田</p>
              </div>
              <div class="input__item__name">
                @isset ($firstname)
                  <input type="text" name="firstname" id="firstname" class="input__item" value="{{$firstname}}" onblur="chkFirstName(this);">
                @else
                  <input type="text" name="firstname" id="firstname" class="input__item" onblur="chkFirstName(this);">
                @endisset
                @if ($errors->has('firstname'))
                  <p id="err__firstname" class="err__text">{{$errors->first('firstname')}}</p>
                @else
                  <p id="err__firstname" class="err__text"></p>
                @endif
                <p class="placeholder">例）太郎</p>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <th>
            <label for="gender" class="required__title">
              性別
            </label>
          </th>
          <td>
            <div class="gender__item">
              @isset($gender)
                @switch ($gender)
                  @case ('2')
                    <label for="gender__male" class="radio__label">
                      <input type="radio" name="gender" id="gender__male" class="radio" value="1">
                      <span class="radio__icon"></span>男性
                    </label>
                    <label for="gender__female" class="radio__label">
                      <input type="radio" name="gender" id="gender__female" class="radio" value="2" checked>
                      <span class="radio__icon"></span>女性
                    </label>
                  @break
                  @case ('1')
                    <label for="gender__male" class="radio__label">
                      <input type="radio" name="gender" id="gender__male" class="radio" value="1" checked>
                      <span class="radio__icon"></span>男性
                    </label>
                    <label for="gender__female" class="radio__label">
                      <input type="radio" name="gender" id="gender__female" class="radio" value="2">
                      <span class="radio__icon"></span>女性
                    </label>
                  @break
                @endswitch
              @else
                <label for="gender__male" class="radio__label">
                  <input type="radio" name="gender" id="gender__male" class="radio" value="1" checked>
                  <span class="radio__icon"></span>男性
                </label>
                <label for="gender__female" class="radio__label">
                  <input type="radio" name="gender" id="gender__female" class="radio" value="2">
                  <span class="radio__icon"></span>女性
                </label>
              @endisset
            </div>
          </td>
        </tr>
        <tr>
          <th>
            <label for="email" class="required__title">
              メールアドレス
            </label>
          </th>
          <td>
            @isset ($email)
              <input type="email" name="email" id="email" class="input__item" value="{{$email}}" onblur="chkEmail(this);">
            @else
              <input type="email" name="email" id="email" class="input__item" onblur="chkEmail(this);">
            @endisset
            @if ($errors->has('email'))
              <p id="err__email" class="err__text">{{$errors->first('email')}}</p>
            @else
              <p id="err__email" class="err__text"></p>
            @endif
            <p class="placeholder">例）test@example.com</p>
          </td>
        </tr>
        <tr>
          <th class= "postcode__title">
            <label for="postcode" class="required__title">
              郵便番号
            </label>
          </th>
          <td>
            <div class="input__postcode">
              <p class="postcode__mark">〒</p>
              @isset ($postcode)
                <input type="text" name="postcode" id="postcode" class="input__item" value="{{$postcode}}" pattern="\d{3}-\d{4}" onblur="chkPostcode(this);AjaxZip3.zip2addr(this,'',address,address);">
              @else
                <input type="text" name="postcode" id="postcode" class="input__item" pattern="\d{3}-\d{4}" onblur="chkPostcode(this);AjaxZip3.zip2addr(this,'',address,address);">
              @endisset
            </div>
            @if ($errors->has('postcode'))
              <p id="err__postcode" class="err__text">{{$errors->first('postcode')}}</p>
            @else
              <p id="err__postcode" class="err__text"></p>
            @endif
            <p class="placeholder placeholder__postcode">例）123-4567</p>
          </td>
        </tr>
        <tr>
          <th>
            <label for="address" class="required__title">
              住所
            </label>
          </th>
          <td>
            @isset ($address)
              <input type="text" name="address" id="address" class="input__item" value="{{$address}}" onblur="chkAddress(this);">
            @else
              <input type="text" name="address" id="address" class="input__item" onblur="chkAddress(this);">
            @endisset
            @if ($errors->has('address'))
              <p id="err__address" class="err__text">{{$errors->first('address')}}</p>
            @else
              <p id="err__address" class="err__text"></p>
            @endif
            <p class="placeholder">例）東京都渋谷区千駄ヶ谷1-2-3</p>
          </td>
        </tr>
        <tr>
          <th>
            <label for="building">
              建物名
            </label>
          </th>
          <td>
            @isset ($building)
              <input type="text" name="building" id="building" value="{{$building}}" class="input__item">
            @else
              <input type="text" name="building" id="building" class="input__item">
            @endisset
            @if ($errors->has('building'))
              <p id="err__building" class="err__text">{{$errors->first('building')}}</p>
            @else
              <p id="err__building" class="err__text"></p>
            @endif
            <p class="placeholder">例）千駄ヶ谷マンション101</p>
          </td>
        </tr>
        <tr>
          <th class="textarea__header">
              <label for="opinion" class="required__title textarea__label">
                ご意見
              </label>
          </th>
          <td>
            @isset ($opinion)
              <textarea name="opinion" id="opinion" class="textarea__item" cols="30" rows="4" onblur="chkOpinion(this);">{{$opinion}}</textarea>
            @else
              <textarea name="opinion" id="opinion" class="textarea__item" cols="30" rows="4" onblur="chkOpinion(this);"></textarea>
            @endisset
            @if ($errors->has('opinion'))
              <p id="err__opinion" class="err__text">{{$errors->first('opinion')}}</p>
            @else
              <p id="err__opinion" class="err__text"></p>
            @endif
          </td>
        </tr>
      </table>
      <button class="button__item">確認</button>
    </form>
  </div>
  <script src="{{asset('js/contact.js')}}"></script>
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
@endsection