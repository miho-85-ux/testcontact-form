@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
<div class="thanks__content">
    <div class="content__item">
        <p class="content__title"> お問い合わせありがとうございました</p>
        <form class="content__button" action="/" method="get">
            <button class="content__button__submit" type="submit">HOME</button>
        </form>
    </div>
</div>
<div class="content__background"> 
    <span class="content__background--thanks">Thank you</span>
</div>


@endsection