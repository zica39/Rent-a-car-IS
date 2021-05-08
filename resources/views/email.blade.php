@extends('template.main')

@section('title', 'Email')

@section('content')
    @includeWhen($content == 'index', 'email.index')
    @includeWhen($content == 'show', 'email.show')
    @includeWhen($content == 'create', 'email.create')
    @includeWhen($content == 'edit', 'email.edit')
@endsection
