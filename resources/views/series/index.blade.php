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
            
            <span class="d-flex">
                <a href="{{ route('series.edit', $valorDoIndice->id) }}" class="btn btn-primary btn-sm">
                    E
                </a>
                <form action="{{ route('series.destroy', $valorDoIndice->id) }}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>  
            </span>        
        </li>
        @endforeach
    <ul>
</x-layout>