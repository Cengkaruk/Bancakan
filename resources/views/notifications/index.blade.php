@extends('layout')

@section('content')
<div class="row">
  <div class="column">
    <h4>Notifications</h4>

        @if (Auth::user()->unreadNotifications->count())
		<form method="POST" action="{{ route('notifications.read_all') }}">
			{{ csrf_field() }}
        	<button type="submit">Mark all as read</button>
        </form>
        @else
            - Empty -
        @endif

    <ul>
      @foreach(Auth::user()->unreadNotifications as $notification)
      <li>
      	<a href="{{ route('profiles.show.others', ['username' => $notification->data['user']['username'] ?? $notification->data['user']['id']]) }}">
        	{{ $notification->data['anonymouse'] ? 'Anonymouse' : $notification->data['user']['name'] }}
        </a>

				@if (str_contains($notification->type, 'Answer'))
	        was answered your question
	        <a href="{{ route('questions.show', ['slug' => $notification->data['question']['slug']]) }}">
	        	"{{ $notification->data['answer'] }}"
	      	</a>
      	@endif

      	@if (str_contains($notification->type, 'Reply'))
	        was replied your message
	        @php
				$slug = isset($notification->data['answer']) ? $notification->data['answer']['question']['slug'] : $notification->data['reply'];
	        @endphp
	        <a href="{{ route('questions.show', ['slug' => $slug]) }}">
	        	"{{ $notification->data['reply'] }}"
	      	</a>
      	@endif

				-
				<time class="timeago" datetime="{{ $notification->created_at->toIso8601String() }}">
		      {{ $notification->created_at->diffForHumans() }}
		    </time>

				<a href="{{ route('notifications.read', ['id' => $notification->id]) }}">&times;</a>

  		</li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
