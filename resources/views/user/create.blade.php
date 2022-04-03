@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-12">
            @component('components.backend.card.card-form')
                @slot('isfile', true)
                @slot('action', Route('user.store'))
                @slot('method', 'POST')
                @slot('content')
                    <x-forms.input name="name" label="Nama Lengkap" :isRequired="true" hintText="Harus sesuai dengan KTP" />

                    <x-forms.select name="gender" label="Jenis Kelamin" :isRequired="true">
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </x-forms.select>

                    <x-forms.input name="email" type="email" label="Email" :isRequired="true" />
                    <x-forms.input name="password" type="password" label="password" :isRequired="true" />
                    
                    <div class="text-right">
                        <a href="{{ Route('user.index') }}" class="btn btn-secondary " href="#">{{ __('button.cancel') }}</a>
                        <button type="submit" class="btn btn-primary " href="#">{{ __('button.save') }}</button>
                    </div>

                @endslot
            @endcomponent
        @endsection
