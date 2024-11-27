@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>商品登録</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">商品名</label>
            <input type="text" name="name" id="name" placeholder="商品名を入力" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">値段</label>
            <input type="number" name="price" id="price" placeholder="値段を入力" class="form-control">
        </div>
        <div class="form-group">
            <label>季節</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="seasons[]" value="春"> 春</label>
                <label><input type="checkbox" name="seasons[]" value="夏"> 夏</label>
                <label><input type="checkbox" name="seasons[]" value="秋"> 秋</label>
                <label><input type="checkbox" name="seasons[]" value="冬"> 冬</label>
            </div>
        </div>
        <div class="form-group">
            <label for="description">商品説明</label>
            <textarea name="description" id="description" placeholder="商品の説明を入力" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="image">商品画像</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection
