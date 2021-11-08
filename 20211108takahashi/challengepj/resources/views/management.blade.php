@extends('layouts.default')

@push('css')
  <link rel="stylesheet" href="{{asset('css/management.css')}}">
@endpush

@section('title','管理システム')

@section('content')
  <div class="search__item">
    <form action="/search" method="GET">
      <table>
        @csrf
        <tr>
          <th>
            <label for="name">お名前</label>
          </th>
          <td>
            @isset($searchName)
              <input type="text" name="name" id="name" class="search__input" value="{{$searchName}}">
            @else
              <input type="text" name="name" id="name" class="search__input">
            @endisset
          </td>
          <th>
            <label for="gender">性別</label>
          </th>
          <td>
            @isset($searchGender)
              @switch($searchGender)
                @case('0')
                  <label for="gender__all" class="radio__label">
                    <input type="radio" name="gender" id="gender__all" class="radio" value="0" checked>
                    <span class="radio__icon"></span>全て
                  </label>
                  <label for="gender__male" class="radio__label">
                    <input type="radio" name="gender" id="gender__male" class="radio" value="1">
                    <span class="radio__icon"></span>男性
                  </label>
                  <label for="gender__female" class="radio__label">
                    <input type="radio" name="gender" id="gender__female" class="radio" value="2">
                    <span class="radio__icon"></span>女性
                  </label>
                @break
                @case('1')
                  <label for="gender__all" class="radio__label">
                    <input type="radio" name="gender" id="gender__all" class="radio" value="0">
                    <span class="radio__icon"></span>全て
                  </label>
                  <label for="gender__male" class="radio__label">
                    <input type="radio" name="gender" id="gender__male" class="radio" value="1" checked>
                    <span class="radio__icon"></span>男性
                  </label>
                  <label for="gender__female" class="radio__label">
                    <input type="radio" name="gender" id="gender__female" class="radio" value="2">
                    <span class="radio__icon"></span>女性
                  </label>
                @break
                @case('2')
                  <label for="gender__all" class="radio__label">
                    <input type="radio" name="gender" id="gender__all" class="radio" value="0">
                    <span class="radio__icon"></span>全て
                  </label>
                  <label for="gender__male" class="radio__label">
                    <input type="radio" name="gender" id="gender__male" class="radio" value="1">
                    <span class="radio__icon"></span>男性
                  </label>
                  <label for="gender__female" class="radio__label">
                    <input type="radio" name="gender" id="gender__female" class="radio" value="2" checked>
                    <span class="radio__icon"></span>女性
                  </label>
                @break
              @endswitch
            @else
              <label for="gender__all" class="radio__label">
                <input type="radio" name="gender" id="gender__all" class="radio" value="0" checked>
                <span class="radio__icon"></span>全て
              </label>
              <label for="gender__male" class="radio__label">
                <input type="radio" name="gender" id="gender__male" class="radio" value="1">
                <span class="radio__icon"></span>男性
              </label>
              <label for="gender__female" class="radio__label">
                <input type="radio" name="gender" id="gender__female" class="radio" value="2">
                <span class="radio__icon"></span>女性
              </label>
            @endisset
          </td>
        </tr>
        <tr>
          <th><label for="created_at">登録日</label></th>
          <td>
            <div class="created_at__item">
              @isset($searchCreatedFrom)
                <input type="date" name="created_from" id="created_from" class="search__input" value="{{$searchCreatedFrom}}">
              @else
                <input type="date" name="created_from" id="created_from" class="search__input">
              @endisset
              <span class="date__range">~</span>
              @isset($searchCreatedTo)
                <input type="date" name="created_to" id="created_to" class="search__input" value="{{$searchCreatedTo}}">
              @else
                <input type="date" name="created_to" id="created_to" class="search__input">
              @endisset
            </div>
          </td>
        </tr>
        <tr>
          <th><label for="email">メールアドレス</label></th>
          <td>
            @isset($searchEmail)
              <input type="text" name="email" id="email" class="search__input" value="{{$searchEmail}}">
            @else
              <input type="text" name="email" id="email" class="search__input">
            @endisset
          </td>
        </tr>
      </table>
      <button class="button__item">検索</button>
      <button class="button__reset" formaction ="/reset">リセット</button>
    </form>
  </div>
  <div class="result__item">
    <form action="/delete" method="POST">
      <table>
        @csrf
        <tr class="result__header__item">
          <th>ID</th>
          <th>お名前</th>
          <th>性別</th>
          <th>メールアドレス</th>
          <th>ご意見</th>
          <th></th>
        </tr>
        @foreach ($items as $item)
          <tr class="result__detail__item">
            <td>
              <input type="text" name="id" id="id" value="{{$item->id}}" readonly="readonly">
            </td>
            <td>{{$item->fullname}}</td>
            <td>
              @if($item->gender == '1')
                男性
              @elseif($item->gender == '2')
                女性
              @endif
            </td>
            <td>{{$item->email}}</td>
            <td>
              <div class="mouseover__item">
                {{Str::limit($item->opinion,50)}}
              </div>
              <div class="mouseover__box">
                <p>{{$item->opinion}}</p>
              </div>
            </td>
            <td>
              <button class="button__item button__small">削除</button>
            </td>
          </tr>
        @endforeach
      </table>
    </form>
  </div>
  <script src="{{asset('js/management.js')}}"></script>
@endsection