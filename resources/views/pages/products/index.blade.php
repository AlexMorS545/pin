@extends('layouts.app')

@section('content')

    <div id="index-table">
        <div class="header">
            <p>{{ __('АРТИКУЛ') }}</p>
            <p>{{ __('НАЗВАНИЕ') }}</p>
            <p>{{ __('СТАТУС') }}</p>
            <p>{{ __('АТРИБУТЫ') }}</p>
        </div>
        <div class="body">
        @foreach($products as $product)
            <div class="item-link" data-id="{{ $product->id }}">
                <p>{{ __($product->article) }}</p>
                <p>{{ __($product->name) }}</p>
                <p>{{ __($model::$statuses[$product->status]) }}</p>
                <p>
                    @if(!empty($product->data))
                        @foreach($product->data as $key => $item)
                            <span>{{ __($key) }}: {{ __($item) }}</span>
                        @endforeach
                    @endif
                </p>
            </div>
        @endforeach
        </div>
    </div>
    <button id="create-btn" type="button" class="btn">{{ __('Добавить') }}</button>
@endsection
