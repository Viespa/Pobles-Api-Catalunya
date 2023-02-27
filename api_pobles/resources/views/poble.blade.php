@extends('layouts.app')

@section("content")

<div class="container mt-5">
        <div class="text-center">
            <h1>{{ __("Llistat d'pobles") }}</h1>
            <a href="{{ route("poble.create") }}" class="btn btn-primary">
                {{ __("Afegir poble") }}
            </a>
        </div>
      

        <table class="table table-bordered mb-5 mt-5">
            <thead>
                <tr class="table-success">
                <th>{{ __("Codi") }}</th>
                <th>{{ __("Municipi") }}</th>
                <th>{{ __("Comarca") }}</th>
                <th>{{ __("Provincia") }}</th>
                <th>{{ __("Descripcio") }}</th>
                <th>{{ __("Latitud") }}</th>
                <th>{{ __("Longitud") }}</th>
                <th>{{ __("Imatge") }}</th>
                <th>{{ __("Accions") }}</th>
                </tr>
            </thead>
            <tbody id="the_table_body">
                @forelse($pobles as $poble)
                <tr>
                    <th scope="row">{{ $poble->codi }}</th>
                    <td>{{ $poble->nom }}</td>
                    <td>{{ $poble->comarca }}</td>
                    <td>{{ $poble->provincia }}</td>
                    <td>{{ $poble->descripcio }}</td>
                    <td>{{ $poble->latitud }}</td>
                    <td>{{ $poble->longitud }}</td>
                    <td style="text-align: center;" ><img  style="border-radius:2rem" src="{{ $poble->img }}" width="50" height="50"></td>
                    <td>
                        <a href="{{ route("poble.edit", ["poble" => $poble]) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a> 
                        <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-project-{{ $poble->id }}-form').submit();"><i class="fa-solid fa-trash"></i></a>
                        <form id="delete-project-{{ $poble->id }}-form" action="{{ route("poble.destroy", ["poble" => $poble]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <div class="text-center" role="alert">
                            <p><strong class="font-bold">{{ __("No hi ha pobles") }}</strong></p>
                            <span>{{ __("No hi ha cap dada a mostrar") }}</span>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $pobles->links() !!}
        </div>
    </div>

@endsection

