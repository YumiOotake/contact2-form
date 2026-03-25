@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/contacts/confirm.css') }}">
@endsection
@section('content')
    <div class="confirm-form__content">
        <div class="confirm-form__heading">
            <h2 class="confirm-form__heading-ttl">Confirm</h2>
        </div>
        <form action="{{ route('contacts.store') }}" method="POST" class="confirm-form">
            @csrf
            <table class="confirm-form__table">
                <tr class="confirm-form__table-row">
                    <th class="confirm-form__table-title">お名前</th>
                    <td class="confirm-form__table-data">{{ $contact['first_name'] }}</td>
                    <td class="confirm-form__table-data">{{ $contact['last_name'] }}</td>
                </tr>
                <tr class="confirm-form__table-row">
                    <th class="confirm-form__table-title">性別</th>
                    <td class="confirm-form__table-data">{{ $contact['gender'] }}</td>
                </tr>
                <tr class="confirm-form__table-row">
                    <th class="confirm-form__table-title">メールアドレス</th>
                    <td class="confirm-form__table-data">{{ $contact['email'] }}</td>
                </tr>
                <tr class="confirm-form__table-row">
                    <th class="confirm-form__table-title">電話番号</th>
                    <td class="confirm-form__table-data">{{ $contact['tel'] }}</td>
                </tr>
                <tr class="confirm-form__table-row">
                    <th class="confirm-form__table-title">住所</th>
                    <td class="confirm-form__table-data">{{ $contact['address'] }}</td>
                </tr>
                <tr class="confirm-form__table-row">
                    <th class="confirm-form__table-title">建物名</th>
                    <td class="confirm-form__table-data">{{ $contact['building'] }}</td>
                </tr>
                <tr class="confirm-form__table-row">
                    <th class="confirm-form__table-title">お問い合わせの種類</th>
                    <td class="confirm-form__table-data">{{ $contact['category_id'] }}</td>
                </tr>
                <tr class="confirm-form__table-row">
                    <th class="confirm-form__table-title">お問い合わせ内容</th>
                    <td class="confirm-form__table-data">{{ $contact['detail'] }}</td>
                </tr>
            </table>

            <div class="confirm-form__button">
                <button class="confirm-form__button-submit" type="submit">送信</button>
            </div>
        </form>
        <div class="confirm__button">
            <a href="{{ route('contact.index') }}" class="confirm__button-edit">修正</a>
        </div>


    </div>
@endsection
