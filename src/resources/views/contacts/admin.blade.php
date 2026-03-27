@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/contacts/admin.css') }}">
@endsection
@section('content')
    <div class="admin__content">
        <div class="admin__heading">
            <h2 class="heading-ttl admin__heading-ttl">Admin</h2>
        </div>
        <form class="search-form" action="{{ route('contacts.search') }}" method="get">
            <div class="search-form__content">
                <div class="search-form__item">
                    <input type="text" name="keyword" class="search-form__item-input" placeholder="名前やメールアドレスを入力してください "
                        value="{{ request('keyword') }}">
                </div>
                <div class="search-form__item">
                    <select name="gender" class="search-form__item-input">
                        <option value="">性別</option>
                        <option value="0" {{ request('gender') == '0' ? 'selected' : '' }}>全て</option>
                        <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                        <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                        <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
                    </select>
                </div>
                <div class="search-form__item">
                    <select name="category_id" class="search-form__item-input">
                        <option value="">お問い合わせの種類</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="search-form__item">
                    <input type="date" id="date" name="date" class="search-form__item-input" placeholder="年/月/日">
                </div>
                <div class="search-form__button">
                    <button class="search-form__button--submit" type="submit">検索</button>
                    <a href="{{ route('contacts.admin') }}" class="search-form__button--reset">
                        リセット
                    </a>
                </div>
            </div>
        </form>
        <div class="admin-content__nav">
            <div class="admin-content__export">
                <a href="" class="admin-content__export--button">エクスポート</a>
            </div>
            <div class="admin-content__paginate">
                {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
            </div>
        </div>


        <div class="contact-table">
            <table class="contact-table__inner">
                <thead>
                    <tr class="contact-table__row">
                        <th class="contact-table__header">お名前</th>
                        <th class="contact-table__header">性別</th>
                        <th class="contact-table__header">メールアドレス</th>
                        <th class="contact-table__header">お問い合わせの種類</th>
                        <th class="contact-table__header"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $contact)
                        <tr class="contact-table__row">
                            <td class="contact-table__item">{{ $contact->full_name }}</td>
                            <td class="contact-table__item">{{ $contact->gender_label }}</td>
                            <td class="contact-table__item">{{ $contact->email }}</td>
                            <td class="contact-table__item">{{ $contact->category->content }}</td>
                            <td class="contact-table__item">
                                <div class="contact-table__detail">
                                    <a class="js-modal-open contact-table__detail-button" data-id="{{ $contact->id }}">詳細</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="contact-table__empty">
                                お問い合わせがありません。
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @forelse ($contacts as $contact)
                <dialog id="modal-{{ $contact->id }}" class="modal">
                    <button class="js-modal-close modal__close">×</button>
                    <div class="modal__inner">
                        <table class="modal__table">
                            <tr class="modal__table-row">
                                <th class="modal__table-title">お名前</th>
                                <td class="modal__table-data">{{ $contact->first_name }} {{ $contact->last_name }}</td>
                            </tr>
                            <tr class="modal__table-row">
                                <th class="modal__table-title">性別</th>
                                <td class="modal__table-data">{{ $contact->gender_label }}</td>
                            </tr>
                            <tr class="modal__table-row">
                                <th class="modal__table-title">メールアドレス</th>
                                <td class="modal__table-data">{{ $contact->email }}</td>
                            </tr>
                            <tr class="modal__table-row">
                                <th class="modal__table-title">電話番号</th>
                                <td class="modal__table-data">{{ $contact->tel }}</td>
                            </tr>
                            <tr class="modal__table-row">
                                <th class="modal__table-title">住所</th>
                                <td class="modal__table-data">{{ $contact->address }}</td>
                            </tr>
                            <tr class="modal__table-row">
                                <th class="modal__table-title">建物名</th>
                                <td class="modal__table-data">{{ $contact->building }}</td>
                            </tr>
                            <tr class="modal__table-row">
                                <th class="modal__table-title">お問い合わせの種類</th>
                                <td class="modal__table-data">{{ $contact->category->content }}</td>
                            </tr>
                            <tr class="modal__table-row">
                                <th class="modal__table-title">お問い合わせ内容</th>
                                <td class="modal__table-data">{{ $contact->detail }}</td>
                            </tr>
                        </table>
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="modal__button">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="modal__button--delete">
                                削除
                            </button>
                        </form>
                    </div>
                </dialog>
                @empty
            @endforelse
        </div>
    </div>
@endsection
