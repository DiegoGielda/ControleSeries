<x-layout title="Séries">
    <!--
         <a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a>

         Modificando para quando alterar a rota não precisar alterar a view
    -->
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
        
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    <ul class="list-group"> 
        @foreach ($series as $valorDoIndice)
        <li class="list-group-item d-flex justify-content-between aling-items-center">
            {{ $valorDoIndice->nome }}         
            <form action="{{ route('series.destroy', $valorDoIndice->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    X
                </button>
            </form>        
        </li>
        @endforeach
    <ul>
</x-layout>