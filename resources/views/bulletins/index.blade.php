@extends('layouts.app')
@section('title', $viewData['title']);
@section('content')
 <!-- Page Content-->
<div class="container px-5 my-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Anuncios</span></h1>
    </div>
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
            <!-- Experience Section-->
            <section>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="text-primary fw-bolder mb-0">Publicaciones</h2>
                </div>

                @foreach ($viewData['bulletins'] as $bulletin)
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <div class="row align-items-center gx-5">
                            <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                <div class="bg-light p-4 rounded-4">
                                    <div class="text-primary fw-bolder mb-2"><a href="{{route('bulletin.detail', ['bulletin' => $bulletin->id]) }}">{{ $bulletin->title}}</a></div>
                                    <div class="small fw-bolder">Por: {{ $bulletin->user->name }}</div>
                                    <div class="small text-muted">Articulo: {{ $bulletin->category->title }}</div>
                                    <div class="small text-muted">{{ $bulletin->created_at }}</div>
                                </div>
                            </div>
                            <div class="col-lg-8"><div>{{ $bulletin->content }}</div></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>
            <!-- Divider-->
            <div class="pb-5"></div>
        </div>
    </div>
</div>   
@endsection