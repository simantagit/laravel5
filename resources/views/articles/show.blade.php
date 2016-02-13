@extends('app')

@section('content')
	<h1>Article</h1>
	<article>
  	 	<h2>
  	 		{{ $article->title }}
  	 	</h2>

  	 	<div class="body">
  	 		{{ $article->body }}
  	 	</div>
		
		<h5>Tags :</h5>
		<ul>
			@foreach($article->tag as $tags)
				<li>{{  $tags->name }}</li>
			@endforeach
		</ul>
		
     </article>
@stop