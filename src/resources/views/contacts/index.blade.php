@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/contacts/index.css') }}">
@endsection
@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2 class="heading-ttl contact-form__heading-ttl">Contact</h2>
        </div>
        <form action="{{ route('contacts.confirm') }}" method="POST" class="contact-form">
            @csrf
            <div class="contact-form__group">
                <div class="contact-form__group-title">
                    <label for="name" class="contact-form__label--item">お名前</label>
                    <span class="contact-form__label--span">※</span>
                </div>
                <div class="contact-form__group-content">
                    <input type="text" id="first_name" name="first_name"
                        value="{{ old('first_name', session('first_name')) }}" class="contact-form__input--text"
                        placeholder="例: 山田">
                    <input type="text" id="last_name" name="last_name"
                        value="{{ old('last_name', session('last_name')) }}" class="contact-form__input--text"
                        placeholder="例: 太郎">
                </div>
                <div class="contact-form__error">
                    @error('last_name')
                        {{ $message }}
                    @enderror
                    @error('first_name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="contact-form__group">
                <div class="contact-form__group-title">
                    <label for="male" class="contact-form__label--item">性別</label>
                    <span class="contact-form__label--span">※</span>
                </div>
                <div class="contact-form__group-content">
                    <input type="radio" id="male" name="gender" value="1"
                        {{ old('gender', session('gender')) === '1' ? 'checked' : '' }} class="contact-form__input--radio">
                    <label for="male" class="contact-form__label--radio">男性</label>

                    <input type="radio" id="female" name="gender" value="2"
                        {{ old('gender', session('gender')) === '2' ? 'checked' : '' }} class="contact-form__input--radio">
                    <label for="female" class="contact-form__label--radio">女性</label>

                    <input type="radio" id="other" name="gender" value="3"
                        {{ old('gender', session('gender')) === '3' ? 'checked' : '' }} class="contact-form__input--radio">
                    <label for="other" class="contact-form__label--radio">その他</label>
                </div>
                <div class="contact-form__error">
                    @error('gender')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="contact-form__group">
                <div class="contact-form__group-title">
                    <label for="email" class="contact-form__label--item">メールアドレス</label>
                    <span class="contact-form__label--span">※</span>
                </div>
                <div class="contact-form__group-content">
                    <input type="email" id="email" name="email" value="{{ old('email', session('email')) }}"
                        class="contact-form__input--text" placeholder="例: test@example.com">
                </div>
                <div class="contact-form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="contact-form__group">
                <div class="contact-form__group-title">
                    <label for="tel1" class="contact-form__label--item">電話番号</label>
                    <span class="contact-form__label--span">※</span>
                </div>
                <div class="contact-form__group-content">
                    {{-- mergeで繋げて表示？ーは擬似要素か？ --}}
                    <input type="tel" id="tel1" name="tel1" value="{{ old('tel1') }}"
                        class="contact-form__input--text" placeholder="080">
                    <input type="tel" id="tel2" name="tel2" value="{{ old('tel2') }}"
                        class="contact-form__input--text" placeholder="1234">
                    <input type="tel" id="tel3" name="tel3" value="{{ old('tel3') }}"
                        class="contact-form__input--text" placeholder="5678">
                </div>
                <div class="contact-form__error">
                    @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
                        {{ $errors->first('tel1') ?: $errors->first('tel2') ?: $errors->first('tel3') }}
                    @endif
                </div>
            </div>
            <div class="contact-form__group">
                <div class="contact-form__group-title">
                    <label for="address" class="contact-form__label--item">住所</label>
                    <span class="contact-form__label--span">※</span>
                </div>
                <div class="contact-form__group-content">
                    <input type="text" id="address" name="address" value="{{ old('address', session('address')) }}"
                        class="contact-form__input--text" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                </div>
                <div class="contact-form__error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="contact-form__group">
                <div class="contact-form__group-title">
                    <label for="building" class="contact-form__label--item">建物名</label>
                </div>
                <div class="contact-form__group-content">
                    <input type="text" id="building" name="building"
                        value="{{ old('building', session('building')) }}" class="contact-form__input--text"
                        placeholder="例: test@example.com">
                </div>
                <div class="contact-form__error">
                    @error('building')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="contact-form__group">
                <div class="contact-form__group-title">
                    <label for="category" class="contact-form__label--item">お問い合わせの種類</label>
                    <span class="contact-form__label--span">※</span>
                </div>
                <div class="contact-form__group-content">
                    <select name="category_id" class="contact-form__select" id="category">
                        <option value="">選択してください</option>
                        @foreach ($categories as $category)
                            <option
                                value="{{ $category->id }}"{{ old('category_id', session('category_id')) == $category->id ? 'selected' : '' }}>
                                {{ $category->content }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="contact-form__error">
                    @error('category_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="contact-form__group">
                <div class="contact-form__group-title">
                    <label for="detail" class="contact-form__label--item">お問い合わせ内容</label>
                    <span class="contact-form__label--span">※</span>
                </div>
                <div class="contact-form__group-content">
                    <textarea name="detail" id="detail" class="contact-form__textarea" placeholder="お問い合わせ内容をご記載ください">{{ old('detail', session('detail')) }}</textarea>
                </div>
                <div class="contact-form__error">
                    @error('detail')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="contact-form__button">
                <button class="contact-form__button-submit" type="submit">確認画面</button>
            </div>
        </form>
    </div>
@endsection
