@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__head">
        <h1>Contact</h1>
    </div>
    <div class="contact-form__inner">
        <form class="form" action="/confirm" method="POST">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--title">お名前</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <input class="form__input--text" type="text" name="first_name" id="name" placeholder="例: 山田" value="{{ old('first_name', $contact->first_name ?? '') }}" >
                    <input class="form__input--text" type="text" name="last_name" id="name" placeholder="例: 太郎" value="{{ old('last_name', $contact->last_name  ?? '') }}">
                    <div class="form__error">
                        @if ($errors->has('first_name'))
                        <p class="form__error--first_name">{{$errors->first('first_name')}}</p>
                        @endif
                        @if ($errors->has('last_name'))
                        <p class="form__error--last_name">{{$errors->first('last_name')}}</p>
                        @endif
                    </div>
                </div>
            </div>
    
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--title">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content--gender">
                    <label class="form__label--radio">
                        <input type="radio" name="gender" id="male" value='1' {{ old('gender') == '1' ? 'checked' : '' }} >
                        <span>男性</span>
                        <label class="form__label--radio">
                            <input type="radio" name="gender" id="female" value='2' {{ old('gender') == '2' ? 'checked' : '' }} >
                            <span>女性</span>
                        </label>
                        <label class="form__label--radio">
                            <input type="radio" name="gender" id="other" value='3' {{ old('gender') == '3' ? 'checked' : '' }} >
                            <span>その他</span>
                        </label>
                    </label>
                </div>
                <p class="form__error--gender">
                    @error('gender')
                        {{ $message }}
                    @enderror
                </p>
            </div>
    
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--title">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <input class="form__input--text" type="email" name="email" id="email" placeholder="例: test@example.com" value="{{ old('email', $contact->email ?? '') }}">
                    <p class="form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--title">電話番号</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <input class="form__input--text" type="tel" name="tel1" id="tel1" placeholder="080"  value="{{ old('tel1') }}">
                    <span>-</span>
                    <input class="form__input--text" type="tel" name="tel2" id="tel2" placeholder="1234"  value="{{ old('tel2') }}">
                    <span>-</span>
                    <input class="form__input--text" type="tel" name="tel3" id="tel3" placeholder="5678" size="4" value="{{ old('tel3') }}" >
                    <p class="form__error">
                        @if ($errors->has('tel1'))
                        {{ $errors->first('tel1') }}
                        @elseif($errors->has('tel2'))
                        {{ $errors->first('tel2') }}
                        @else
                        {{ $errors->first('tel3') }}
                        @endif
                    </p>
                </div>
            </div>
    
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--title">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <input class="form__input--text" type="text" name="address" id="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    <p class="form__error">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
    
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--title">建物名</span>
                </div>
                <div class="form__group-content">
                    <input class="form__input--text" type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--title">お問い合わせの種類</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <select class="form__input--text" name="category_id">
                        <option value="" selected disabled {{ old('category_id') ? '' : 'selected' }}>選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{old('category_id') == $category->id ? 'selected' : ''}} >{{ $category->content}}</option>
                        @endforeach
                    </select>
                    <p class="form__error">
                        @error('category_id')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--title">お問い合わせの内容</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <textarea class="form__input--text" name="detail" id="" cols="30" rows="10" placeholder="お問い合わせ内容を入力してください">{{ old('detail') }}</textarea>
                    <p class="form__error">
                        @error('detail')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button--submit"  type="submit">確認画面</button>
            </div>
        </form>
    </div>
</div>
@endsection