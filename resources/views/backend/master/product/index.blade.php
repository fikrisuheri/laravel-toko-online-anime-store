@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.backend.card.card-table')
                @slot('header')
                    <h4 class="card-title">{{ __('menu.product') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('master.product.create') }}" class="btn btn-primary">{{ __('button.add') }}
                            {{ __('menu.product') }}</a>
                    </div>
                @endslot
                @slot('thead')
                    <tr>
                        <th>{{ __('field.product_name') }}</th>
                        <th>{{ __('field.category_name') }}</th>
                        <th>{{ __('field.thumbnails') }}</th>
                        <th>{{ __('field.price') }}</th>
                        <th>{{ __('text.sold') }}</th>
                        <th>{{ __('field.created_at') }}</th>
                        <th>{{ __('field.action') }}</th>
                    </tr>
                @endslot
                @slot('tbody')
                    @foreach ($data['product'] as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td><img src="{{ $product->thumbnails_path }}" class="img-thumbnail" width="100" alt=""></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->total_sold }}</td>
                            <td>{{ tanggal($product->created_at) }}</td>
                            <td>
                                <x-button.dropdown-button :title="__('field.action')">
                                    <a class="dropdown-item has-icon" href="{{ route('master.product.edit',$product->id) }}"><i class="far fa-edit"></i>
                                        {{ __('button.edit') }}</a>
                                    <a class="dropdown-item has-icon" href="{{ route('master.product.show',$product->id) }}"><i class="far fa-eye"></i>
                                        {{ __('button.detail') }}</a>
                                    <a class="dropdown-item has-icon btn-delete" href="{{ route('master.product.delete',$product->id) }}"><i class="fa fa-trash"></i>
                                        {{ __('button.delete') }}</a>
                                </x-button.dropdown-button>
                            </td>
                        </tr>
                    @endforeach
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
