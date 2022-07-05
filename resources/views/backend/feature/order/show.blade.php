@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-md-right">
                                <button class="float-lg-left mb-lg-0 mb-3  btn btn-warning btn-icon icon-left"><i
                                        class="fa fa-print"></i> Print</button>
                                <div class="mb-lg-0 mb-3">
                                    <a href="javascript:;" class="btn btn-success btn-icon icon-left" data-toggle="modal"
                                        data-target="#resiModal" data-id="{{ $data['order']->invoice_number }}"><i
                                            class="fa fa-truck"></i>
                                        Input Resi</a>
                                    <a href="{{ route('feature.order.index') }}"
                                        class="btn btn-primary btn-icon icon-left"><i class="fa fa-arrow-left"></i>
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
                                        <strong>{{ __('text.billed_to') }}:</strong><br>
                                        {{ $data['order']->Customer->name }}<br>
                                        {{ $data['order']->Customer->email }}<br>
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>{{ __('text.shipped_to') }}:</strong><br>
                                        {{ $data['order']->recipient_name }}<br>
                                        {{ $data['order']->address_detail }}<br>
                                        {{ $data['order']->destination }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>{{ __('text.order_status') }}:</strong>
                                        <div class="mt-2">
                                            {!! $data['order']->status_name !!}
                                        </div>
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>{{ __('text.order_date') }}:</strong><br>
                                        {{ $data['order']->created_at }}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title font-weight-bold">{{ __('text.order_summary') }}</div>
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
                                                <td><a
                                                        href="{{ route('product.show', ['categoriSlug' => $detail->Product->category->slug, 'productSlug' => $detail->Product->slug]) }}">{{ $detail->product->name }}</a>
                                                </td>
                                                <td class="text-center">{{ rupiah($detail->product->price) }}</td>
                                                <td class="text-center">{{ $detail->qty }}</td>
                                                <td class="text-right">{{ rupiah($detail->total_price_per_product) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <strong>{{ __('text.shipping_method') }}:</strong>
                                    <p class="section-lead text-uppercase">{{ $data['order']->courier }}
                                        {{ $data['order']->shipping_method }}</p>
                                    @if ($data['order']->receipt_number != null)
                                    <strong>{{ __('text.receipt_number') }}:</strong>
                                        <p class="section-lead text-uppercase">{{ $data['order']->receipt_number }} </p>
                                    @endif
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Subtotal</div>
                                        <div class="invoice-detail-value">{{ rupiah($data['order']->subtotal) }}</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">{{ __('text.shipping_cost') }}</div>
                                        <div class="invoice-detail-value">{{ rupiah($data['order']->shipping_cost) }}
                                        </div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">
                                            {{ rupiah($data['order']->total_pay) }}</div>
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
  <div class="card">
    <div class="card-header">
        <h4 class="card-title">Order Track</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="activities">
                    @foreach ($data['order']->OrderTrack()->get() as $orderTrack)
                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="{{ $orderTrack->icon }}"></i>
                            </div>
                            <div class="activity-detail bg-primary text-white">
                                <div class="mb-2">
                                    <span class="text-job text-white">{{ $orderTrack->created_at->diffForHumans() }}</span>
                                    <span class="bullet"></span>
                                </div>
                                <p>{{ __($orderTrack->description) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
@push('modal')
    <div class="modal fade" id="resiModal" tabindex="-1" role="dialog" aria-labelledby="resiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('feature.order.inputresi') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resiModalLabel">Input Resi Pengiriman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nomor Pesanan</label>
                            <input type="text" class="form-control" name="invoice_number" id="invoice_number"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Resi</label>
                            <input type="text" class="form-control" name="receipt_number" id="receipt_number"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('button.cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('button.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endpush
@push('js')
    <script>
        $('#resiModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            $('#invoice_number').val(id);
        });
    </script>
@endpush
