@extends('layouts.app')

@section('content')
<section class="login">
    <div class="wrapper">
        @foreach (['success', 'danger'] as $key)
        @if(Session::has($key))
        <div class="session-msg alert alert-{{ $key }}">
            <p>{{ Session::get($key) }}</p>
        </div>
        @endif
        @endforeach
        <h2>Contacts</h2>
        <div class="create-new">
            <a class="btn btn-primary" href="{{ url('/users/create') }}">{{ __('new contact') }}</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" cellspacing="0" id="listing_table">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('name') }}</th>
                        <th>{{ __('email') }}</th>
                        <th>{{ __('job title') }}</th>
                        <th>{{ __('city') }}</th>
                        <th>{{ __('country') }}</th>
                        <th>{{ __('actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($users as $user)
                    <tr>
                        <td class="count">{{ $count }}</td>
                        <td class="name">{{ $user->name }}</td>
                        <td class="email">{{ $user->email }}</td>
                        <td class="job">
                            @if ($user->job)
                            {{ $user->job }}
                            @else
                            -
                            @endif
                        </td>
                        <td class="city">
                            @if ($user->city)
                            {{ $user->city }}
                            @else
                            -
                            @endif
                        </td>
                        <td class="country">
                            @if ($user->country)
                            {{ $user->country }}
                            @else
                            -
                            @endif
                        </td>
                        <td class="action">
                            <a class="btn btn-primary edit" href="/users/{{ $user->id }}/edit"
                                title="Edit">{{ __('edit') }}</a>
                            <form action="/users/{{ $user->id }}" method="POST" class="delete">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-danger" type="submit">{{ __('delete') }}</button>
                            </form>
                        </td>
                    </tr>
                    @php $count++ @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
