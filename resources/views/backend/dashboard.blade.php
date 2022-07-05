@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Order Statistics This Month
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $data['total_pending'] }}</div>
                            <div class="card-stats-item-label">Pending</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $data['total_shipping'] }}</div>
                            <div class="card-stats-item-label">Shipping</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $data['total_completed'] }}</div>
                            <div class="card-stats-item-label">Completed</div>
                        </div>
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $data['total_order'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ __('menu.product') }}</h4>
                    </div>
                    <div class="card-body">
                        {{ $data['total_product'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>User</h4>
                    </div>
                    <div class="card-body">
                        {{ $data['total_user'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Grafik Penjualan</h4>
                <div class="card-header-action">
                    <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                </div>
              </div>
                <div class="collapse show" id="mycard-collapse">
                    <div class="card-body">
                        {!! $data['chart']->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">{{ __('text.latest_order') }}</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive table-invoice">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($data['last_order'] as $order)
                            <tr>
                                <td><a
                                        href="{{ route('feature.order.show',$order->id) }}">{{ $order->invoice_number }}</a>
                                </td>
                                <td class="font-weight-600">{{ $order->one_product }}</td>
                                <td>{!! $order->status_name !!}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="{{ route('feature.order.show',$order->id) }}"
                                        class="btn btn-danger">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
                <h4>Best Products</h4>
            </div>
            <div class="card-body">
                <div class="owl-carousel owl-theme" id="products-carousel">
                    @foreach ($data['best_products'] as $best_product)
                        <div>
                            <div class="product-item pb-3">
                                <div class="product-image">
                                    <img alt="image" src="{{ $best_product->thumbnails_path }}" class="img-fluid">
                                </div>
                                <div class="product-details">
                                    <div class="product-name">{{ $best_product->name }}</div>
                                    <div class="product-review">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="text-muted text-small">{{ $best_product->total_sold }}
                                        {{ __('text.sold') }}</div>
                                    <div class="product-cta">
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              {!! $data['chartPie']->container() !!}
            </div>
          </div>
          <div class="card card-hero">
            <div class="card-header">
                <div class="card-icon">
                    <i class="far fa-question-circle"></i>
                </div>
                <h4>14</h4>
                <div class="card-description">Customers need help</div>
            </div>
            <div class="card-body p-0">
                <div class="tickets-list">
                    <a href="#" class="ticket-item">
                        <div class="ticket-title">
                            <h4>My order hasn't arrived yet</h4>
                        </div>
                        <div class="ticket-info">
                            <div>Laila Tazkiah</div>
                            <div class="bullet"></div>
                            <div class="text-primary">1 min ago</div>
                        </div>
                    </a>
                    <a href="#" class="ticket-item">
                        <div class="ticket-title">
                            <h4>Please cancel my order</h4>
                        </div>
                        <div class="ticket-info">
                            <div>Rizal Fakhri</div>
                            <div class="bullet"></div>
                            <div>2 hours ago</div>
                        </div>
                    </a>
                    <a href="#" class="ticket-item">
                        <div class="ticket-title">
                            <h4>Do you see my mother?</h4>
                        </div>
                        <div class="ticket-info">
                            <div>Syahdan Ubaidillah</div>
                            <div class="bullet"></div>
                            <div>6 hours ago</div>
                        </div>
                    </a>
                    <a href="features-tickets.html" class="ticket-item ticket-more">
                        View All <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
          
        </div>
        <div class="col-md-4">
         
        </div>
    </div>
@endsection
@push('js')
    {{ $data['chart']->script() }}
    {{ $data['chartPie']->script() }}
    <script>
        $("#products-carousel").owlCarousel({
            items: 3,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 4
                }
            }
        });
    </script>
@endpush
