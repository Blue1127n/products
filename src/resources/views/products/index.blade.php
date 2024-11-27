@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="header-row">
        @if (!empty($search))
        <h2 class="container__heading">❝{{ $search }}❞の商品一覧</h2>
        @else
        <h2 class="container__heading">商品一覧</h2>
        @endif
        <a href="{{ route('products.register') }}" class="add-button">+ 商品を追加</a>
    </div>

    <div class="main-content">
        <div class="sidebar">
            <div class="search-group">
                <form action="{{ route('products.index') }}" method="GET" class="search-form">
                    <input type="text" name="search" id="search" placeholder="商品名で検索" value="{{ request('search') }}" class="search-input">
                    <button type="submit" class="search-button">検索</button>
                </form>
            </div>
            <div class="sort-group">
                <label for="sort" class="sort-label">価格順で表示</label>
                <form action="{{ route('products.index') }}" method="GET" id="sort-form">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="sort" id="sort" onchange="document.getElementById('sort-form').submit()" class="sort-select">
                        <option value="">価格で並べ替え</option>
                        <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>低い順に表示</option>
                        <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>高い順に表示</option>
                    </select>
                </form>
            </div>
            <div class="filter-container">
                <div class="tags">
                @if (request('sort') === 'asc')
                <div class="tag">
                    <span>低い順に表示</span>
                    <a href="{{ route('products.index', ['search' => request('search')]) }}" class="tag__remove">×</a>
                </div>
                @elseif (request('sort') === 'desc')
                <div class="tag">
                    <span>高い順に表示</span>
                    <a href="{{ route('products.index', ['search' => request('search')]) }}" class="tag__remove">×</a>
                </div>
                @endif
                </div>
            </div>
        </div>
        <div class="products">
            @foreach ($products as $product)
            <a href="{{ route('products.show', ['productId' => $product->id]) }}" class="product-card">
                <img class="product-image" src="{{ asset('storage/images/fruits-img/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="product-details">
                    <span class="product-name">{{ $product->name }}</span>
                    <span class="product-price">¥{{ number_format($product->price) }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <div class="pagination">
        {{ $products->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection
