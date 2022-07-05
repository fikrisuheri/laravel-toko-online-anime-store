@extends('layouts.backend.app')
@section('content')
    @component('components.backend.card.card-form')
        @slot('action',route('setting.web.update'))
        @slot('content')
        @foreach ($data['setting'] as $item)
        @if($item['type'] == 0)
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label>{{ $item['label'] }}</label>
                    <input name="field[{{ $item['id'] }}]" id="{{ $item['id'] }}" class="form-control @error($item['id']) is-invalid @enderror" 
                    type="text" autocomplete="false" value="{{ $item['value'] }}">
                    @error($item['id'])
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        @elseif($item['type'] == 1)
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label>{{ $item['label'] }}</label>
                    <textarea name="field[{{ $item['id'] }}]" class="summernote @error($item['id'])@endif" rows="3">{{ $item['value'] }}</textarea>
                   @error($item['id'])
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        @elseif($item['type'] == 2)
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <img src="{{ $item['file_path'] }}" alt="{{ $item['name'] }}" height="150px" width="150px">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label>{{ $item['label'] }}</label>
                    <input type="file" name="field[{{$item['id']}}]" class="form-control">
                   @error($item['id'])
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        @endif
        @endforeach

        <div class="col">
            <div class="text-end">
                <button type="submit" class="btn btn-primary me-0" href="#">Simpan</button>
            </div>
        </div>
    </div>
        @endslot
    @endcomponent
@endsection