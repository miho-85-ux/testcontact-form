@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<!-- 後で消す分 -->
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="contact-form__content">
    <div class="contact-form__head">
        <h1>Contact</h1>
    </div>
    <form class="form" action="/confirm" method="POST">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__inout--text" type="text" name="first_name" placeholder="例: 山田" value="{{ old('first_name', $contact->first_name ?? '') }}" >
                <input class="form__inout--text" type="text" name="last_name" placeholder="例: 太郎" value="{{ old('last_name ', $contact->last_name  ?? '') }}">
            </div>
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <label class="form__label--radio"><input type="radio" name="gender" value="1">男性</label>
                <label class="form__label--radio"><input type="radio" name="gender" value="2">女性</label>
                <label class="form__label--radio"><input type="radio" name="gender" value="3">その他</label>
            </div>
            <div class="form__error">
                @error('gender')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__inout--text" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email', $contact->email ?? '') }}">
            </div>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                @php
                $telParts = explode( '-', $contact->tel ?? '');
                @endphp
                <input class="form__inout--text" type="tel" name="tel1" placeholder="080" size="4" value="{{ old('tel1', $telParts[0] ?? '') }}">-
                <input class="form__inout--text" type="tel" name="tel2" placeholder="1234" size="4" value="{{ old('tel2', $telParts[1] ?? '') }}">-
                <input class="form__inout--text" type="tel" name="tel3" placeholder="5678" size="4" value="{{ old('tel3', $telParts[2] ?? '') }}">
            </div>
            <div class="form__error">
                @error('tel')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__inout--text" type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', $contact->address ?? '') }}">
            </div>
            <div class="form__error">
                @error('address')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">建物名</span>
            </div>
            <div class="form__group-content">
                <input class="form__inout--text" type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building', $contact->building ?? '') }}">
            </div>
            <div class="form__error">
                @error('building')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">お問い合わせの種類</span>
            </div>
            <div class="form__group-content">
                <select class="form__inout--text" name="category_id">
                    <option value="" selected disabled>選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{ $category -> id }}">{{ $category->content}}</option>
                    @endforeach
                </select>
            </div>
             <div class="form__error">
                @error('content')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">お問い合わせの内容</span>
            </div>
            <div class="form__group-content">
                <textarea class="form__inout--text" name="detail" placeholder="お問い合わせ内容を入力してください">{{ old('detail',$contact->detail) }}</textarea>
            </div>
            <div class="form__error">
                @error('detail')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__button">
            <button class="form__button--submit"  type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection