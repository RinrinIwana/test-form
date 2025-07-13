@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('content')
<div class="admin-container">
    <h2>Admin</h2>
    <form action="{{ route('admin.contacts.index') }}" method="GET" class="search-form">
        @csrf
        <div class="search-form__row">
            <input type="text" name="name" value="{{ request('name') }}" placeholder="名前（姓・名・フルネーム）">
            <input type="email" name="email" value="{{ request('email') }}" placeholder="メールアドレス">
            <select name="gender">
                <option value="all" {{ request('gender', 'all') == 'all' ? 'selected' : '' }}>全て</option>
                <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
            </select>
            <select name="category_id">
                <option value="">お問い合わせ種別</option>
                <option value="1" {{ request('category_id') == '1' ? 'selected' : '' }}>お届けについて</option>
                <option value="2" {{ request('category_id') == '2' ? 'selected' : '' }}>商品の交換について</option>
                <option value="3" {{ request('category_id') == '3' ? 'selected' : '' }}>トラブル</option>
                <option value="4" {{ request('category_id') == '4' ? 'selected' : '' }}>お問い合わせ</option>
                <option value="5" {{ request('category_id') == '5' ? 'selected' : '' }}>その他</option>
            </select>
            <input type="date" name="date" value="{{ request('date') }}">
            <button type="submit">検索</button>
            <a href="{{ route('admin.contacts.index') }}" class="reset-button">リセット</a>
        </div>
    </form>

    <div class="pagination-container">
        {{ $contacts->links('pagination::bootstrap-4') }}
    </div>
    
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせ種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>
                    @if ($contact->gender == 1) 男性
                    @elseif ($contact->gender == 2) 女性
                    @else その他
                    @endif
                </td>
                <td>{{ $contact->email }}</td>
                <td>
                    @switch($contact->category_id)
                        @case(1) お届けについて @break
                        @case(2) 商品の交換について @break
                        @case(3) トラブル @break
                        @case(4) お問い合わせ @break
                        @case(5) その他 @break
                        @default 未設定
                    @endswitch
                </td>
                <td>
                    <a href="#delete-modal-{{ $contact->id }}" class="open-modal-button">詳細</a>
                </td>
            </tr>
            <div class="modal-wrapper" id="delete-modal-{{ $contact->id }}">
    <a href="#close-modal" class="modal-overlay"></a>
    <div class="modal">
      <a href="#close-modal" class="close-modal">×</a>
      <p><strong>名前：</strong>{{ $contact->last_name }} {{ $contact->first_name }}</p>
      <p><strong>性別：</strong>
        @if ($contact->gender == 1) 男性
        @elseif ($contact->gender == 2) 女性
        @else その他
        @endif
      </p>
      <p><strong>メール：</strong>{{ $contact->email }}</p>
      <p><strong>お問い合わせ種類：</strong>
        @switch($contact->category_id)
          @case(1) お届けについて @break
          @case(2) 商品の交換について @break
          @case(3) トラブル @break
          @case(4) お問い合わせ @break
          @case(5) その他 @break
        @endswitch
      </p>
      <p><strong>内容：</strong>{{ $contact->detail }}</p>
      <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-buttons">
          <button type="submit" class="delete-button">削除</button>
        </div>
      </form>
    </div>
  </div>
        @endforeach
        </tbody>
    </table>
</div>
@endsection