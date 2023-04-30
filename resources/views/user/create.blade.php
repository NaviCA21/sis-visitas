@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center mx-auto">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-header">
                        <form method="POST" action="{{ route('user.index') }}">
                            @csrf

                            {{-- Name field --}}
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="{{ __('Nombre Completo') }}" autofocus>

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                    </div>
                                </div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- cargo --}}
                            <div class="input-group mb-3">
                                <input type="text" name="cargo"
                                    class="form-control @error('cargo') is-invalid @enderror" value="{{ old('cargo') }}"
                                    placeholder="{{ __('Cargo del usuario') }}" autofocus>

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                    </div>
                                </div>

                                @error('cargo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Email field --}}
                            <div class="input-group mb-3">
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    placeholder="{{ __('Correo') }}">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span
                                            class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                    </div>
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 select-container">
                                <x-input-label :value="__('Tipo de Usuario')" />
                                <select id="tipo_usuario" name="tipo_usuario"
                                    class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-800 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" disabled selected>Seleccionar..</option>
                                    @foreach ($tipoUsuarios as $tipoUsuario)
                                        <option value="{{ $tipoUsuario->id }}">{{ $tipoUsuario->tipo_usuario }}</option>
                                    @endforeach
                                </select>
                            </div>




                            {{-- Password field --}}
                            <div class="input-group mb-3">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="{{ __('Contraceña') }}">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                    </div>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Confirm password field --}}
                            <div class="input-group mb-3">
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    placeholder="{{ __('Confirmar Contraceña') }}">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                    </div>
                                </div>

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Register button --}}
                            <button type="submit"
                                class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                                <span class="fas fa-user-plus"></span>
                                {{ __('Crear usuario') }}
                            </button>
                            <a href="{{ route('user.index') }}" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                                <span class="fas fa-arrow-left"></span>
                                {{ __('Cancelar operacion') }}
                            </a>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
