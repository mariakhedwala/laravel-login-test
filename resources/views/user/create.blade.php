@extends('layouts.app')

@section('content')
<section class="create">
    <div class="wrapper">
        <h2>Register here</h2>
        <form method="POST" action="{{ $action = $user->id ? "/users/$user->id" : "/users" }}" id="login" novalidate autocomplete="off">
            @method($method = $user->id ? 'PATCH' : 'POST')
            @csrf
            <div class="form-group">
                <label for="name">{{ __('name') }}</label>

                <div class="form-group__name">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                        name="name" value="{{ old('name') }}" autofocus="true">
                    
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email">{{ __('email') }}</label>

                <div class="form-group__email">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email" value="{{ old('email') }}" autofocus="true">
                    
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="job">{{ __('job title') }}</label>

                <div class="form-group__job">
                    <input id="job" type="text" class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}"
                        name="job" value="{{ old('job') }}" autofocus="true">
                    @if ($errors->has('job'))
                    <div class="err visible"><?php echo $errors->first('job'); ?></div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="city">{{ __('city') }}</label>

                <div class="form-group__city">
                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                        name="city" value="{{ old('city') }}" autofocus="true">
                    @if ($errors->has('city'))
                    <div class="err visible"><?php echo $errors->first('city'); ?></div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="country">{{ __('country') }}</label>

                <div class="form-group__country">
                    <input id="country" type="text"
                        class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country"
                        value="{{ old('country') }}" autofocus="true">
                    @if ($errors->has('country'))
                    <div class="err visible"><?php echo $errors->first('country'); ?></div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password">{{ __('password') }}</label>

                <div class="form-group__password">
                    <input id="password" type="password" class="form-control" name="password">
                    <div class="error-field err">
                    </div>
                    @if ($errors->has('password'))
                    <div class="err visible"><?php echo $errors->first('password'); ?></div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="confirmPassword">{{ __('confirm password') }}</label>

                <div class="form-group__password">
                    <input id="confirmPassword" type="password" class="form-control" name="confirmPassword">
                    @if ($errors->has('confirmPassword'))
                    <div class="err visible"><?php echo $errors->first('confirmPassword'); ?></div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <button id="create-user" type="submit" class="form-group__create">
                    {{ __('submit') }}
                </button>
            </div>
        </form>
    </div>
</section>
