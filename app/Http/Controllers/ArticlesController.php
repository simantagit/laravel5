<?php namespace App\Http\Controllers;
use Auth;
use App\Article;

use App\http\Request;
use App\http\Requests\CreateArticleRequest;
use Illuminate\HttpResponse;
//use Request;
use Carbon\Carbon;

class ArticlesController extends controller{

	public function __construct()
	{
		$this->middleware('auth',['only'=>'create']);
	}
	public function index()
	{
		$articles = Article::latest('published_at')->published()->get();
		//$artcls = Article::find(4)->user;
       // dd($artcls);
		//return $articles;
		return view('articles.index',compact('articles'));
	}

	public function show($id)
	{
		$article = Article::findOrfail($id);
		//dd($article->published_at->diffForHumans());sasasaaas nnnnnnnnn
		return view('articles.show',compact('article'));
	}
	
	public function create()
	{
		$tags = \App\Tag::lists('name','id');
		
		return view('articles.create',compact('tags'));
	}
	
	public function store(CreateArticleRequest $request)
	{
		//dd($request->input('tags'));
		//Auth::user()->id;exit;
		//$article = new Article($request->all());
		//Auth::user()->articles()->save($article);
		$input = $request->all();
		$input['user_id']=Auth::user()->id;
		//$input['published_at'] = Carbon::now();s	
		$article = Article::create($input);
		
		$article->tag()->sync($request->input('tag_list'));
		
		return redirect('articles');
	}
	public function edit($id)
	{
		
		$article = Article::findOrfail($id);
		
		$tags = \App\Tag::lists('name','id');
		return view('articles.edit',compact('article','tags'));
	}
	public function update($id,CreateArticleRequest $request)
	{	
		//dd($request->input('tag_list'));
		
		$article =  Article::find($id);
		
		
		$article->update($request->all());
		
		$article->tag()->sync($request->input('tag_list'));
		
		//return redirect('articles');
	}
	
}