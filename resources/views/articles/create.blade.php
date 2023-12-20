
<x-layout>

    <div class="container-fluid header">
        <div class="row justify-content-center h-100">
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <h1 class="text-white">Inserisci un nuovo articolo</h1>
            </div>
        </div>
    </div>

     
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
            <div class="col-12 col-md-6 justify-content-center">
            <form class="shadow border-4 rounded-3 w-100 p-3 mt-5" action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Category</label>
                <input type="text" name="category" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Autore dell'articolo</label>
                <input type="text" name="author" class="form-control" id="Password">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Testo dell'articolo</label>
                <input type="text" name="body" class="form-control" id="confirm">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Inserisci Immagine</label>
                <input type="file" name="img" class="form-control" id="img">
            </div>
            <div class="mb-3">
                @foreach($consoles as $console)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="consoles[]" value="{{$console->id}}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    {{$console->name}}
                </label>
            </div>
                @endforeach
            </div>
                <button type="submit" class="btn btn-primary">Pubblica articolo</button>
            </form>
            </div>
        </div>
    </div>


</x-layout>









