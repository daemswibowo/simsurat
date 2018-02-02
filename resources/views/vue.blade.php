@extends ('layouts.app')
@section ('content')
@foreach ($components as $component)
	{!! $component !!}
@endforeach
@endsection