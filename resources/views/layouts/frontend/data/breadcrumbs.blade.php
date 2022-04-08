<div class="section-header">
    <h1 class="text-capitalize">{{ request()->segment(3) ?? request()->segment(2)  }}</h1>
    <div class="section-header-breadcrumb">
      @foreach (request()->segments() as $index => $item)
      <div class="breadcrumb-item text-capitalize">{!! $loop->last ? '' : '<a href="#">' !!} {{ $item }}</a></div>
      @endforeach
    </div>
  </div>