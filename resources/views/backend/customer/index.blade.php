@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.backend.card.card-table')
                @slot('header')
                    <h4 class="card-title">{{ __('menu.customer') }}</h4>
                    <div class="card-header-action">
                    </div>
                @endslot
                @slot('thead')
                    <tr>
                        <th>{{ __('field.name') }}</th>
                        <th>{{ __('field.email') }}</th>
                        <th>{{ __('field.join_at') }}</th>
                    </tr>
                @endslot
                @slot('tbody')
                    @foreach ($data['customer'] as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ tanggal($customer->created_at) }}</td>
                        </tr>
                    @endforeach
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
