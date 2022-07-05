@extends('layouts.backend.app')
@section('content')
    @component('components.backend.card.card-form')
        @slot('action', route('setting.shippingUpdate'))
        @slot('content')
            <div class="form-group">
                <label for="">Provinsi</label>
                <select name="province_id" id="province_id" class="form-control">
                    @foreach ($data['provinces'] as $province)
                        <option value="{{ $province['province_id'] }}" {{ $data['setting']->province_id == $province['province_id'] ? 'selected' : '' }}>{{ $province['province'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Kota/Kabupaten</label>
                <select name="city_id" id="city_id" class="form-control">
                    @foreach ($data['city'] as $city)
                        <option value="{{ $city['city_id'] }}" {{ $data['setting']->city_id == $city['city_id'] ? 'selected' : '' }}>{{ $city['type'] }} {{ $city['city_name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary me-0" href="#">Simpan</button>
            </div>
            </div>
        @endslot
    @endcomponent
@endsection
@push('js')
    <script>
         $('#province_id').on('change', function() {
            var provinceId = $('#province_id option:selected').val();
            $('#city_id').empty();
            $('#city_id').append('<option value="">-- Loading Data --</option>');
            $.ajax({
                url: '/rajaongkir/province/' + provinceId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    if (data) {
                        $('#city_id').empty();
                        $('#city_id').removeAttr('disabled');
                        $('select[name="city_id"]').append(
                            'option value="" selected>-- Select City --</option>');
                        $.each(data, function(key, city) {
                            $('select[name="city_id"]').append('<option value="'+city.city_id+'">' + city.type + ' ' + city.city_name +
                                '</option>');
                        });
                    } else {
                        $('#city_id').empty();
                    }
                }
            });
        });
    </script>
@endpush