@extends('template.main')

@section('title', 'Cars Management')

@section('content')
    @includeWhen($content == 'index', 'cars.index')
    @includeWhen($content == 'show', 'cars.show')
    @includeWhen($content == 'create', 'cars.create')
    @includeWhen($content == 'edit', 'cars.edit')
@endsection
