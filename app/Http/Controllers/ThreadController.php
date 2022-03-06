<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thread;
use App\Models\Reply;
use App\Models\User;

//{
 // User,
  //Thread,
  //Channel
//};

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use App\Http\Requests\ThreadRequest;


class ThreadController extends Controller
{
  private $thread;

  public function __construct(Thread $thread)
  {
    $this->thread = $thread;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $threads = $this->thread->paginate(15);
    return view('threads.index', compact('threads'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('threads.create');
    // return view('threads.create', [
    //   'channels' => $channel->all()
    // ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  ThreadRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {
      $this->thread->create($request->all());
      dd('Tópico criado com sucesso');      
      // $thread['slug'] = Str::slug($thread['title']);

      // $user = User::find(1);
      // $thread = $user->threads()->create($thread);

      // flash('Tópico criado com sucesso!')->success();
      // return redirect()->route('threads.show', $thread->slug);
    } catch (\Exception $e) {
      $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar sua requisição!';
      dd($message);
     // flash($message)->warning();
     // return redirect()->back();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  string  $thread
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
   // $thread = $this->thread->whereSlug($thread)->first();

   // if (!$thread) return redirect()->route('threads.index');

    return view('threads.show', $id);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  string  $thread
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //$thread = $this->thread->whereSlug($thread)->first();

//$this->authorize('update', $thread);
    $thread = $this->thread->find($id);

    return view('threads.edit', compact('thread'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  ThreadRequest  $request
   * @param  string  $thread
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    try {

      $thread = $this->thread->find($id);
     
     // $thread = $this->thread->whereSlug($thread)->first();
      $thread->update($request->all());

      flash('Tópico atualizado com sucesso!')->success();

      return redirect()->route('threads.show', $thread->slug);
    } catch (\Exception $e) {
      $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar sua requisição!';

      flash($message)->warning();
      //return redirect()->back();
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  string  $thread
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {

      $thread = $this->thread->find($id);
     // $thread = $this->thread->whereSlug($thread)->first();
      //$thread->delete();

      flash('Tópico removido com sucesso!')->success();
      //return redirect()->route('threads.index');
    } catch (\Exception $e) {
      $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar sua requisição!';

      flash($message)->warning();
     // return redirect()->back();
    }
  }
}
