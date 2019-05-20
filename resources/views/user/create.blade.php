@extends('layouts.app')

@section('content')
<section class="login">
    <div class="wrapper">
        <h2>Register here</h2>
        <form method="POST" action="" id="login" novalidate autocomplete="off">
            @method($method = $user->id ? 'PATCH' : 'POST')
            @csrf
            <div class="form-group">
                <label for="name">{{ __('name') }}</label>

                <div class="form-group__name">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                        name="name" value="{{ old('name') }}" autofocus="true">
                    <div class="error-field err"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="email">{{ __('email') }}</label>

                <div class="form-group__email">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email" value="{{ old('email') }}" autofocus="true">
                    <div class="error-field err"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="job">{{ __('job title') }}</label>

                <div class="form-group__job">
                    <input id="job" type="text" class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}"
                        name="job" value="{{ old('job') }}" autofocus="true">
                    <div class="error-field err"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="city">{{ __('city') }}</label>

                <div class="form-group__city">
                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                        name="city" value="{{ old('city') }}" autofocus="true">
                    <div class="error-field err"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="country">{{ __('country') }}</label>

                <div class="form-group__country">
                    <input id="country" type="text"
                        class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country"
                        value="{{ old('country') }}" autofocus="true">
                    <div class="error-field err"></div>
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
                    <div class="error-field err">
                    </div>
                </div>
            </div>
        </form>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>
