@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifiëer uw e-mailadres') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Een nieuwe verificatie link is naar je e-mailadres gestuurd.') }}
                        </div>
                    @endif

                    {{ __('Voordat je verder gaat, graag check uw email voor een varificatie link.') }}
                    {{ __('Als je geen mail hebt ontvangen') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik hier voor een nieuwe mail') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
