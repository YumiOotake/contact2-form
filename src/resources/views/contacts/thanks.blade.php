@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/contacts/thanks.css') }}">
@endsection
@section('content')
    <div class="thanks__content">
        <div class="thanks__heading">
            <h2 class="thanks__heading-ttl">お問い合わせありがとうございました</h2>
        </div>
        <form action="{{ route('contacts.index') }}" class="thanks-form" method="GET">
            <button class="hanks-form__button">HOME</button>
        </form>
    </div>
@endsection
{{-- .background-text {
  position: relative;
  display: flex; /* フレックスボックスを有効化 */
  justify-content: center; /* 水平方向の中央寄せ */
  align-items: center; /* 垂直方向の中央寄せ */
  font-size: 20px; /* 通常テキスト用のフォントサイズ */
  color: #000; /* 通常テキストの色 */
  margin: 50px 0; /* 上下に50pxのマージンを設定 */
}

.background-text::after {
  content: '背景テキスト';
  position: absolute;
  top: 50%; /* 垂直方向の中央寄せ */
  left: 50%; /* 水平方向の中央寄せ */
  transform: translate(-50%, -50%); /* 中央に配置 */
  font-size: 70px; /* 背景テキストのフォントサイズ */
  color: rgba(209, 201, 173, 0.3); /* 背景テキストの色（透明度含む） */
  z-index: -1; /* 背景として配置 */
  white-space: nowrap; /* テキストの折り返し防止 */
} --}}
