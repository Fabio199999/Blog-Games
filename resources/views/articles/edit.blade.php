
<x-layout>

    <div class="container-fluid header">
        <div class="row justify-content-center h-100">
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <h1 class="text-white">Modifica l'articolo</h1>
            </div>
        </div>
    </div>

    @if (session('message'))  
    <div class="alert alert-success">
        {{ session('message') }}  
    </div>
    @endif
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 justify-content-around">
            <form class="shadow border-4 rounded-3 w-100 p-3 mt-5" action="{{route('articles.update', compact('article'))}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{$article->title}}" type="text" name="title" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Category</label>
                <input value="{{$article->category}}" type="text" name="category" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Testo dell'articolo</label>
                <textarea value="" type="text" name="body" class="form-control" id="confirm">{{$article->body}}</textarea>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Immagine precedente</label>
                <img src="Storage::url($article->img)">
            <div class="mb-3">
                <label for="body" class="form-label">Inserisci Immagine</label>
                <input type="file" name="img" class="form-control" id="img">
            </div>
            <div class="mb-3">
                @foreach($consoles as $console)
            <div class="form-check">
                <input 
                @checked($article->consoles->contains($console))
                <input class="form-check-input" type="checkbox" name="consoles[]" value="{{$console->id}}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    {{$console->name}}
                </label>
            </div>
                @endforeach
            </div>
                <button type="submit" class="btn btn-primary">Modifa l'articolo</button>
            </form>
            </div>
        </div>
    </div>


</x-layout>









