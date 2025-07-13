@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/form/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>
  <form class="form" action="{{ route('confirm') }}" method="POST">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content form__group-content--name">  <!-- クラス追加 -->
        <div class="form__input--text">
          <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
        </div>
        <div class="form__input--text">
          <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
        </div>
        <div class="form__error">
          @error('last_name')
          {{ $message }}
          @enderror
          @error('first_name')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__group-content form__group-content--radio">
          <label class="radio-label">
            <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} /> 男性
          </label>
          <label class="radio-label">
            <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }} /> 女性
          </label>
          <label class="radio-label">
            <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }} /> その他
          </label>
        </div>
        <div class="form__error">
          @error('gender')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
        </div>
        <div class="form__error">
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">電話番号</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content form__group-content--tel">  <!-- クラス追加 -->
        <div class="form__input--text">
          <input type="tel" name="tel1" maxlength="3" placeholder="080" value="{{ old('tel1') }}" />
        </div>
        <div>
          <p>-</p>
        </div>
        <div class="form__input--text">
          <input type="tel" name="tel2" maxlength="4" placeholder="1234" value="{{ old('tel2') }}" />
        </div>
        <div>
          <p>-</p>
        </div>
        <div class="form__input--text">
          <input type="tel" name="tel3" maxlength="4" placeholder="5678" value="{{ old('tel3') }}" />
        </div>
        <div class="form__error">
          @error('tel1')
          {{ $message }}<br>
          @enderror
          @error('tel2')
          {{ $message }}<br>
          @enderror
          @error('tel3')
          {{ $message }}<br>
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address" placeholder="例: 東京都渋谷区千駄々谷1-2-3" value="{{ old('address') }}" />
        </div>
        <div class="form__error">
          @error('address')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="building" placeholder="例: 千駄々谷マンション101" value="{{ old('building') }}" />
        </div>
        <div class="form__error">
          @error('building')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせの種類</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__group-content form__group-content--select">
          <select name="category_id">
            <option value="" disabled {{ old('category_id') == '' ? 'selected' : '' }}>選択してください</option>
            <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>お届けについて</option>
            <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>商品の交換について</option>
            <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>トラブル</option>
            <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>お問い合わせ</option>
            <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }}>その他</option>
          </select>
        </div>
        <div class="form__error">
          @error('category_id')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--textarea">
          <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
        </div>
        <div class="form__error">
          @error('detail')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
  <a href="{{ route('admin.contacts.index') }}">管理画面へ</a>
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">ログアウト</button>
</form>
</div>
@endsection