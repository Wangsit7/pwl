@extends('layouts.index')
@section('content')

    <br/>
    @foreach ($ar_film as $f)
    <div class="card" style="width: 18rem;">
       <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">{{ $f->title }}</h5>
        <p class="card-text">
        Sinopsis : {{ $f->sinopsis }}
                <br/>Rating : {{ $f->rating }} 
                <br/>Durasi : {{ $f->durasi }}
                <br/>Tahun : {{ $f->tahun }}
                <br/>Produksi : {{ $f->pro }}
                <br/>Pengarang :{{ $f->nama }}
                <br/>Genre : {{ $f->gen }}

        </p>
        <a href="{{ url('/film') }}" class="btn btn-primary">Go Back</a>
        </div>
    @endforeach
    
@endsection