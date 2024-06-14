@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu direccion de correo') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo link de verificacion a tu direccion de correo.') }}
                        </div>
                    @endif

                    {{ __('Antes de seguir, Revise su correo y precione el link de verificacion.') }}
                    {{ __('Si no ha recibido el correo.') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Precione aqui para enviar un nuevo link verificatorio') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
