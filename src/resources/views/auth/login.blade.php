@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection
@section('content')
    <div class="login-form__content">
        <div class="login-form__heading">
            <h2 class="heading-ttl login-form__heading-ttl">Login</h2>
        </div>
        <form action="{{ route('login') }}" method="POST" class="login-form">
            @csrf
            <div class="login-form__group">
                <div class="login-form__group-title">
                    <label for="email" class="login-form__label--item">メールアドレス</label>
                </div>
                <div class="login-form__group-content">
                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                        class="login-form__input--text" placeholder="例: test@example.com">
                </div>
                <div class="login-form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="login-form__group">
                <div class="login-form__group-title">
                    <label for="password" class="login-form__label--item">パスワード</label>
                </div>
                <div class="login-form__group-content">
                    <input type="password" id="password" name="password"
                        class="login-form__input--text" placeholder="例: coachtech1106">
                </div>
                <div class="login-form__error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="login-form__button">
                <button class="login-form__button-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
@endsection
