@extends('layout')

@section('title', 'Portfolio')

@section('content')
	<h1>@lang('Projects')</h1>
	<a href="{{route('projects.create')}}">@lang('Create New Project')</a>
	<ul>
		@forelse($projects as $projectItem)
			<li><a href="{{ route('projects.show', $projectItem) }}">{{ $projectItem->title }}</a> <br><small>{{ $projectItem->description }}</small><br>{{ $projectItem->created_at->format('d-m-yy') }} - {{ $projectItem->created_at->diffForHumans() }}</li><br>
		@empty
			<li>No hay proyectos para mostrar</li>
		@endforelse
		{{ $projects->links() }}
	</ul>
@endsection
