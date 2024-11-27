@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="container-form">
        <div class="details">
            <a href="{{ route('products.index') }}">商品一覧</a> > {{ $product->name }}
        </div>

        <div class="product-container">
            <!-- 左側エリア -->
            <div class="product-left">
                @if ($product->image)
                    <img src="{{ asset('storage/images/fruits-img/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                @endif
                <div class="file-group">
                    <input type="file" name="image" id="image" class="file-input">
                    <span class="file-name">{{ $product->image }}</span>
                </div>
            </div>

            <!-- 右側エリア -->
            <div class="product-right">
                <div class="form-group">
                    <label for="name">商品名</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}">
                </div>

                <div class="form-group">
                    <label for="price">値段</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}">
                </div>

                <div class="form-group">
                    <label>季節</label>
                    <div class="season-group">
                    <label>
                        <input type="checkbox" name="seasons[]" value="春" {{ in_array('春', json_decode($product->seasons, true) ?? []) ? 'checked' : '' }}>
                        春
                    </label>
                    <label>
                        <input type="checkbox" name="seasons[]" value="夏" {{ in_array('夏', json_decode($product->seasons, true) ?? []) ? 'checked' : '' }}>
                        夏
                    </label>
                    <label>
                        <input type="checkbox" name="seasons[]" value="秋" {{ in_array('秋', json_decode($product->seasons, true) ?? []) ? 'checked' : '' }}>
                        秋
                    </label>
                    <label>
                        <input type="checkbox" name="seasons[]" value="冬" {{ in_array('冬', json_decode($product->seasons, true) ?? []) ? 'checked' : '' }}>
                        冬
                    </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">商品説明</label>
            <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="button-group">
            <a href="{{ route('products.index') }}" class="button back">戻る</a>
            <button type="submit" class="button save">変更を保存</button>
            <button type="button" class="button delete"><i class="fa fa-trash"></i></button>
        </div>
    </div>
</div>
@endsection
