@extends('layouts.master')

@section('title', 'Ici les details')

@section('content')
    {{ 'Ici mon super article avec comme slug : ' . $slug . ' avec l\'ID ' . $id }}
@endsection
