@extends('layouts.app')

@section('content')
<section class="login">
    <div class="wrapper">
        <h2>Register here</h2>
        <form method="POST" action="{{ route('login') }}" id="login" novalidate autocomplete="off">
            @method($method = $user->id ? 'PATCH' : 'POST')
            @csrf
            <div class="form-group">
                <label for="email">{{ __('email') }}</label>

                <div class="form-group__email">
                    <input id="email" type="email"
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                        value="{{ old('email') }}" autofocus="true">
                    <div class="error-field err"></div>
                </div>
            </div>
        </form>
    </div>
</section>
