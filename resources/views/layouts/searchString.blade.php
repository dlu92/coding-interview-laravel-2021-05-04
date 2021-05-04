@extends('templates.app')

@section('title', 'Search String')

@section('head')
    <meta name="description" content="Search String">
@endsection

@section('content')

    <div class="title bold">{!! trans('searchString.title') !!}</div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="inputs">
        <div class="single required">
            <span class="title">{!! trans('searchString.inputs.string.text') !!}</span>
            <input class="input" name="string" type="text" placeholder="{!! trans('searchString.inputs.string.placeholder') !!}" value="{!! data_get($data, 'string', '') !!}">
        </div>
        <div class="single submit">
            <button type="button" class="button" onclick="formValidation()">{!! trans('searchString.button') !!}</button>
        </div>
    </div>
    
    @if (count(data_get($data, 'words', [])) > 0)

        <div class="message">

            <span>{!! trans('searchString.message') !!}</span>
            <ul class="listSearch">
                @foreach (data_get($data, 'words', []) as $key => $value)
                    <li>{!! $key !!} => {!! $value !!}</li>
                @endforeach
            </ul>
        </div>

    @endif

@endsection