<x-layout title="Nova Série">
    <!-- 
    <form action="/series/salvar" method="post">
     UTILIZAÇÃO DE COMPONENTIZAÇÃO PARA CRIAÇÃO DE FORMULÁRIOS
    -->
    <x-series.form action="{{ route('series.store') }}" />
</x-layout>