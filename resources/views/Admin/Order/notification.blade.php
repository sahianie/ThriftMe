@extends('Admin.Master.master')

@section('content')
    <h3>Notifications</h3>
    <ul>
        @forelse ($notifications as $notification)
            <li
                style="padding: 10px; margin-bottom: 10px; border-radius: 5px;
    background-color: {{ is_null($notification->read_at) ? '#e0f7ff' : '#f9f9f9' }};">

                @if (is_null($notification->read_at))
                    <strong>[New]</strong>
                @endif

                {{ $notification->data['message'] }}

                @if (is_null($notification->read_at))
                    <form action="{{ route('markAsRead', $notification->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="margin-left: 10px;">Mark as Read</button>
                    </form>
                @endif
            </li>
        @empty
            <li>No Notifications yet.</li>
        @endforelse
    </ul>
@endsection
