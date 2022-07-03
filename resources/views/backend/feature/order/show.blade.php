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
                                    <div class="section-title"> Shipment Method</div>
                                    <p class="section-lead text-uppercase">{{ $data['order']->courier }}
                                        {{ $data['order']->shipping_method }}</p>
                                    @if ($data['order']->receipt_number != null)
                                        <div class="section-title"> Receipt Number</div>
                                        <p class="section-lead text-uppercase">{{ $data['order']->receipt_number }} </p>
                                    @endif
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Subtotal</div>
                                        <div class="invoice-detail-value">{{ rupiah($data['order']->subtotal) }}</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Shipping</div>
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
    <h2 class="section-title">September 2018</h2>
  <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="activities">
                    @foreach ($data['order']->OrderTrack()->get() as $orderTrack)
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i class="fas fa-comment-alt"></i>
                        </div>
                        <div class="activity-detail bg-primary text-white">
                            <div class="mb-2">
                                <span class="text-job text-white">2 min ago</span>
                                <span class="bullet"></span>
                                <a class="text-job" href="#">View</a>
                                <div class="float-right dropdown">
                                    <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-title">Options</div>
                                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item has-icon text-danger trigger--fire-modal-1"
                                            data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                            data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                                    </div>
                                </div>
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
