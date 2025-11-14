@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm-form__content">
    <div class="confirm-form__title">
        <h1>Confirm</h1>
    </div>
    <form class="form" action="/store" method="POST">
        @csrf 
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tbody>
                    
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前</th>
                        <td class="confirm-table__text--name">
                             {{ $data['first_name'] }}{{ $data['last_name'] }}  
                            <input type="hidden" name="first_name" value="{{ $data['first_name'] }}" readonly />                    
                            <input type="hidden" name="last_name" value="{{ $data['last_name'] }}" readonly />                    
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__text--gender">
                           {{ $data['gender_text'] }}                
                            <input type="hidden" name="gender" value="{{ $data['gender'] }}"  readonly /> 
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">メールアドレス</th>
                        <td class="confirm-table__text">
                            <input type="email" name="email" value="{{ $data['email'] }}"  readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">電話番号</th>
                        <td class="confirm-table__text">
                            <input type="tel" name="tel" value="{{ $data['tel'] }}"  readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">住所</th>
                        <td class="confirm-table__text">
                            <input type="text" name="address" value="{{ $data['address'] }}"  readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">建物名</th>
                        <td class="confirm-table__text">
                            <input type="text" name="building" value="{{ $data['building'] }}"  readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせの種類</th>
                        <td class="confirm-table__text--category">
                            {{ $data['category_name'] }}
                            <input type="hidden" name="category_id" value="{{ $data['category_id'] }}"  readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせの内容</th>
                        <td class="confirm-table__text">
                            <textarea name="detail" readonly>{{ $data['detail'] }}</textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="confirm-table__button">
            <button class="button-submit" type="submit" name="action" value="send">送信</button>
            <button class="button-submit__modify" type="submit" name="action" value="back">修正</button>
        </div>
    </form>
</div>

@endsection