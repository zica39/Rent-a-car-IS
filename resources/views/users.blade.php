@extends('template.main')

@section('title', 'Users Management')

@section('content')

   @includeWhen($content == 'index', 'user.index')
   @includeWhen($content == 'show', 'user.show')
   @includeWhen($content == 'create', 'user.create')
   @includeWhen($content == 'edit', 'user.edit')
@endsection
