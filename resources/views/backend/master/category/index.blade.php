@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.backend.card.card-table')
                @slot('header')
                    <h4 class="card-title">{{ __('menu.category') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('master.category.create') }}" class="btn btn-primary">{{ __('button.add') }} {{ __('menu.category') }}</a>
                    </div>
                @endslot
                @slot('thead')
                    <tr>
                        <th>{{ __('field.category_name') }}</th>
                        <th>{{ __('field.slug') }}</th>
                        <th>{{ __('field.created_at') }}</th>
                        <th>{{ __('field.action') }}</th>
                    </tr>
                @endslot
                @slot('tbody')
                    @foreach ($data['category'] as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->action }}</td>
                        </tr>
                    @endforeach
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
