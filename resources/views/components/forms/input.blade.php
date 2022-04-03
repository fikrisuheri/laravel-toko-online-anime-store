<div class="form-group">

    <label for="{{ $id }}">{{ $label }}</label>

    <input
        type="{{ $type }}"
        class="form-control @error($name) is-invalid @enderror"
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder ?? '' }}"
        @if( $value !== null && $value !== "" )
            value="{{ $value }}"
        @else
            value="{{ old($name) }}"
        @endif
        {{ $attributes->merge(['class' => 'form-group']) }}
        {{ $isRequired ? 'required' : '' }} >
        

    @if($hintText)
        <small class="form-text text-muted">{{ $hintText }}</small>
    @endif

    {{-- Dengan Bantuan Error Bag dari Laravel --}}
    @error($name)
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

</div>