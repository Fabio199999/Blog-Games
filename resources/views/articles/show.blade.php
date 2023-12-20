<x-layout>

<div class="container-fluid header">
        <div class="row justify-content-center h-100">
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <h1 class="text-white">Dettagli dell'articolo</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center h-100">

            <div class="col-12 col-md-6 align-items-center justify-content-center">
                <h2>{{$article->title}}</h2>
                <h2>La categoria è: {{$article->category}}</h2>
                <h3>Il nome dell'autore è: {{$article->user->name}}</h3>
                @if(count($article->consoles))
                    <ul>
                        @foreach($article->consoles as $console)
                        <li>
                        {{$console->name}}
                        </li>
                        @endforeach
                    </ul>
                @else
                <h5>NON CI SONO CONSOLE COLLEGATE</h5>
                @endif
                <p>{{$article->body}}</p>
                <a href="{{route('articles.edit', compact('article'))}}" class="btn btn-warning">Modifica</a>
                <form action="{{route('articles.destroy', compact('article'))}}" method="POST">
                 @method('DELETE')
                 @csrf
                <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
              </div>
             <div class="col-12 col-md-6">
                <img src="{{Storage::url($article->img)}}" height="400px" alt="">>
             </div>
            
            </div>
        </div>
    </div>


</x-layout>