@extends('app')

	@section('content')
		<h1>Article :: {{ $article->title }}</h1>
		{!! Form::model($article,['method'=>'PATCH','action'=> ['ArticlesController@update', $article->id]]) !!}
		
			<div class="form-group">
			{!! Form::label('title','Title :') !!}
			{!! Form::text('title',null,['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
			{!! Form::label('body','Body :') !!}
			{!! Form::textarea('body',null,['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
			{!! Form::label('published_at','Published At :') !!}
			{!! Form::input('date','published_at',date('Y-m-d'),['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
			{!! Form::label('tag_list','Tags :') !!}
			{!! Form::select('tag_list[]',$tags,null,['class'=>'form-control','multiple']) !!}
			</div>
			<div class="form-group">			
			{!! Form::submit('Update Article',['class'=>'btn btn-primary form-control']) !!}
			</div>
			@include('errors.list')
		{!! Form::close() !!}
	@stop