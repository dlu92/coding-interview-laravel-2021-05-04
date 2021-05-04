@extends('templates.app')

@section('title', 'Search String')

@section('head')
    <meta name="description" content="Search String">
@endsection

@section('content')

    <div class="title bold">{!! trans('formatAnalysis.title') !!}</div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="inputs">
        <div class="single required">
            <span class="title">{!! trans('formatAnalysis.inputs.string.text') !!}</span>
            <input class="input" name="string" type="text" placeholder="{!! trans('formatAnalysis.inputs.string.placeholder') !!}" value="{!! data_get($data, 'string', '') !!}">
        </div>
        <div class="single submit">
            <button type="button" class="button" onclick="formValidation()">{!! trans('formatAnalysis.button') !!}</button>
        </div>
    </div>
    <div class="message">
        <span>{!! trans('formatAnalysis.message') !!}</span><span class="bold">{!! data_get($data, 'analysis', 'null') !!}</span>
    </div>

@endsection