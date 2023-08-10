@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<section class="py-5">
    <div class="container px-5 mb-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Detalles del anuncio</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-8">
                <!-- Project Card 1-->
                <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center">
                            <div class="p-5">
                                <span class="mb-2 badge rounded-pill text-bg-primary">{{$viewData['bulletin']->category->title}}</span>
                                <h2 class="fw-bolder">{{ $viewData['bulletin']->title }}</h2>
                                <p>{{$viewData['bulletin']->content }}</p>
                                <div class="small m-0">Publicado por {{ $viewData['bulletin']->user->name}}</div>
                                <div class="small m-0">{{ $viewData['bulletin']->created_at}} </div>
                                <a href="{{ route('bulletin.index') }}" class="mt-5 btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Todos los anuncios</a>
                            </div>
                            <img class="img-fluid" src="{{ asset('storage/'.$viewData['bulletin']->image)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection