@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
<div class="thanks__content">
    <div class="content__item">
        <p class="content__background"> Thankyou</p>
    </div>
    <h1 class="content__title"> お問い合わせありがとうございました</h1>
    <div class="content__button">
        <a href="/" class="content__button__submit" type="submit">HOME</a>
    </div>
</div>


@endsection