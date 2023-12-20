<x-layout>

<div class="container-fluid header">
        <div class="row justify-content-center h-100">
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <h1 class="text-white">Ecco tutti i nostri articoli</h1>
            </div>
        </div>
    </div>

    @if (session('message')) 
    <div class="alert alert-success">
        {{ session('message') }} 
    </div>
    @endif

    <div class="container mt-5 mb-2">
        <div class="row justify-content-around">
            @foreach($articles as $article)
            <div class="col-12 col-md-3 mb-4">
                <!-- card -->
                <div class="card" style="width: 18rem;">
                    <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                     <h5 class="card-title">{{$article->title}}</h5>
                     <h4>La categoria: {{$article->category}}</h4>
                     <p class="card-text">{{$article->body}}</p>
                     <a href="{{route('articles.show', compact('article'))}}" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            @endforeach
            </div>
        </div>
    </div>


</x-layout>