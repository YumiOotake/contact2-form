@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection
@section('content')
    <div class="register-form__content">
        <div class="register-form__heading">
            <h2 class="heading-ttl register-form__heading-ttl">Register</h2>
        </div>
        <form action="{{ route('register') }}" method="POST" class="register-form">
            @csrf
            <div class="register-form__group">
                <div class="register-form__group-title">
                    <label for="name" class="register-form__label--item">お名前</label>
                </div>
                <div class="register-form__group-content">
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="register-form__input--text" placeholder="例: 山田 太郎">
                </div>
                <div class="register-form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="register-form__group">
                <div class="register-form__group-title">
                    <label for="email" class="register-form__label--item">メールアドレス</label>
                </div>
                <div class="form__group-content">
                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                        class="register-form__input--text" placeholder="例: test@example.com">
                </div>
                <div class="register-form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="register-form__group">
                <div class="register-form__group-title">
                    <label for="password" class="register-form__label--item">パスワード</label>
                </div>
                <div class="register-form__group-content">
                    <input type="password" id="password" name="password" value="{{ old('password') }}"
                        class="register-form__input--text" placeholder="例: coachtech1106">
                </div>
                <div class="register-form__error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="register-form__button">
                <button class="register-form__button-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
@endsection
