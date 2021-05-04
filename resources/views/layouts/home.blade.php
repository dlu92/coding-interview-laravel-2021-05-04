@extends('templates.app')

@section('title', 'Search String')

@section('head')
    <meta name="description" content="Search String">
@endsection

@section('content')

    <div class="title bold">{!! trans('home.title') !!}</div>
    <div class="message">
        <span>{!! trans('home.message') !!}</span>
        <ul>
            <li><a href="{!! route('search_string') !!}">{!! trans('home.exercises.1') !!}</a></li>
            <li><a href="{!! route('format_analysis') !!}">{!! trans('home.exercises.2') !!}</a></li>
        </ul>
    </div>

@endsection