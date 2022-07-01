@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-md-right">
                                <button class="float-lg-left mb-lg-0 mb-3  btn btn-warning btn-icon icon-left"><i class="fa fa-print"></i> Print</button>
                                <div class="mb-lg-0 mb-3">
                                    <a href="{{ route('feature.order.index') }}" class="btn btn-success btn-icon icon-left"><i class="fa fa-truck"></i>
                                        Input Resi</a>
                                    <a href="{{ route('feature.order.index') }}" class="btn btn-primary btn-icon icon-left"><i class="fa fa-arrow-left"></i>
                                        Kembali</a>
                                </div>
                            </div>
                            <hr class="mb-2">
                            <div class="invoice-title">
                                <h2>Invoice</h2>
                                <div class="invoice-number">Order {{ $data['order']->invoice_number }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Billed To:</strong><br>
                                        Ujang Maman<br>
                                        1234 Main<br>
                                        Apt. 4B<br>
                                        Bogor Barat, Indonesia
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Shipped To:</strong><br>
                                        {{ $data['order']->recipient_name }}<br>
                                        {{ $data['order']->address_detail }}<br>
                                        {{ $data['order']->destination }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Order Status:</strong>
                                        <div class="mt-2">
                                            {!! $data['order']->status_name !!}
                                        </div>
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        {{ $data['order']->created_at }}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Order Summary</div>
                            <p class="section-lead">All items here cannot be deleted.</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tbody>
                                        <tr>
                                            <th data-width="40" style="width: 40px;">#</th>
                                            <th>Item</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-right">Totals</th>
                                        </tr>
                                        @foreach ($data['order']->orderDetail()->get() as $detail)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('product.show',['categoriSlug' => $detail->Product->category->slug , 'productSlug' => $detail->Product->slug]) }}">{{ $detail->product->name }}</a></td>
                                            <td class="text-center">{{ rupiah($detail->product->price) }}</td>
                                            <td class="text-center">{{ $detail->qty }}</td>
                                            <td class="text-right">{{ rupiah($detail->total_price_per_product) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="section-title"> Shipment Method</div>
                                    <p class="section-lead text-uppercase">{{ $data['order']->courier }} {{ $data['order']->shipping_method }}</p>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Subtotal</div>
                                        <div class="invoice-detail-value">{{ rupiah($data['order']->subtotal) }}</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Shipping</div>
                                        <div class="invoice-detail-value">{{ rupiah($data['order']->shipping_cost) }}</div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">{{ rupiah($data['order']->total_pay) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
               
            </div>
        </div>
    </div>
@endsection
