@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__head">
        <h1>Contact</h1>
    </div>
    @foreach($contacts as $contact)
    <form class="form" action="" method="POST">
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__inout--text" type="text" name="first_name" value="例: {{ $contact->first_name }}" >
                <input class="form__inout--text" type="text" name="last_name" value="例: {{ $contact->last_name }}">
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
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__inout--text" type="email" name="enail" value="例: {{ $contact->email }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                @php
                    $telParts = explode('-', $contact->tel);
                @endphp
                <input class="form__inout--text" type="tel" name="tel1" size="4" value="{{ $telParts[0] ?? ''  }}">-
                <input class="form__inout--text" type="tel" name="tel2" size="4" value="{{ $telParts[1] ?? ''  }}">-
                <input class="form__inout--text" type="tel" name="tel3" size="4" value="{{ $telParts[2] ?? ''  }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__inout--text" type="text" name="address" value="例: {{ $contact->address }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">建物名</span>
            </div>
            <div class="form__group-content">
                <input class="form__inout--text" type="text" name="building" value="例: {{ $contact->building }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">お問い合わせの種類<span>
            </div>
            <div class="form__group-content">
                <select class="form__inout--text" name="category_id">
                    <option value="" selected disabled>選択してください</option>
                    @foreach($categories as $category)
                        <option value="{{ $category -> id }}">{{ $category->content}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--title">お問い合わせの内容</span>
            </div>
            <div class="form__group-content">
                <textarea class="form__inout--text" name="detail">{{ $contact->detail }}</textarea>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button--submit"  type="submit">確認画面</button>
        </div>
    </form>
    @endforeach
</div>
@endsection