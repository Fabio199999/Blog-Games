<x-layout>

    <div class="container-fluid header">
        <div class="row justify-content-center h-100">
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <h1 class="text-white">BLOG GAMES</h1>
            </div>
        </div>
    </div>


    @if (session('message'))  {{-- Qui controlla se c'è una variaible in sessione chiamata message --}}
    <div class="alert alert-success">
        {{ session('message') }}  {{-- Qui mi stampa il contenuto di message--}}
    </div>
    @endif
    
</x-layout>