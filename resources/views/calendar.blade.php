@extends('template.main')

@section('title', 'calendar')

@section('content')

    @includeWhen($content == 'index' && !request('view'), 'calendar.index')
    @includeWhen($content == 'index' && request('view') == 'table', 'calendar.index_table')
    @includeWhen($content == 'show', 'calendar.show')
    @includeWhen($content == 'create', 'calendar.create')
    @includeWhen($content == 'edit', 'calendar.edit')

@endsection
