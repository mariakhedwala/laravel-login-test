@extends('layouts.app')

@section('content')
<section class="login">
    <div class="wrapper">
        <h2>Contacts</h2>
        <div class="create-new">
            <a href="{{ url('/users/create') }}">{{ __('new contact') }}</a>
        </div>
        <table class="users" cellspacing="0" id="listing_table">
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
                    <td>{{ $count }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->job }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->country }}</td>
                    <td>
                        <a class="btn btn-primary edit" href="/users/{{ $user->id }}/edit"
                            title="Edit">{{ __('edit') }}</a>
                        <form action="/users/{{ $user->id }}" method="POST" class="delete">
                            @method('DELETE')
                            @csrf
                            
                            <button type="submit">{{ __('delete') }}</button>
                        </form>
                    </td>
                </tr>
                @php $count++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</section>
