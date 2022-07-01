@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.backend.card.card-table')
                @slot('header')
                    <h4 class="card-title">{{ __('menu.order') }}</h4>
                  
                @endslot
                @slot('thead')
                    <tr>
                        <th>{{ __('field.order_invoice') }}</th>
                        <th>{{ __('field.order_customer') }}</th>
                        <th>{{ __('field.order_total') }}</th>
                        <th>{{ __('field.order_status') }}</th>
                        <th>{{ __('field.created_at') }}</th>
                        <th>{{ __('field.action') }}</th>
                    </tr>
                @endslot
                @slot('tbody')
                    @foreach ($data['order'] as $order)
                        <tr>
                            <td>{{ $order->invoice_number }}</td>
                            <td>{{ $order->Customer->name }}</td>
                            <td>{{ $order->total_pay }}</td>
                            <td>{!! $order->status_name !!}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                <x-button.dropdown-button :title="__('field.action')">
                                    <a class="dropdown-item has-icon" href="{{ route('feature.order.show',$order->id) }}"><i class="fa fa-eye"></i>
                                        {{ __('button.detail') }}</a>
                                    @if ($order->status == 1)
                                    <a class="dropdown-item has-icon" href="#"><i class="fa fa-truck"></i>
                                        {{ __('Input Resi') }}</a>
                                    @endif
                                </x-button.dropdown-button>
                            </td>
                        </tr>
                    @endforeach
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
