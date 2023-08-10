
@extends('layouts.app')
@section('title', 'Home - Bulletin Board')
@section('content')
<!-- Header-->
<section class="py-5">
    <div class="container px-5 pb-5">
        <div class="row gx-5 align-items-center">
            <div class="col-xxl-12">
                <!-- Header text content-->
                <div class="text-center text-xxl-start">
                    <div class="badge bg-gradient-primary-to-secondary text-white mb-4"><div class="text-uppercase">Bienvenido &middot; {{ Auth::user()->name }}</div></div>
                    <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Administrar tus anuncios</span></h1>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                        <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="{{ route('admin.store')}}">Crear un nuevo anuncio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section-->
<section class="bg-light py-1">
    <div class="container px-5 mb-5">
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Contenido</th>
                <th scope="col">Categoria</th>
                <th scope="col">Publicado</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @forelse ($viewData['bulletins'] as $bulletin)
                    <tr>
                        <th scope="row">{{ $bulletin->id }}</th>
                        <td><a href="{{ route('bulletin.detail', ['bulletin' => $bulletin->id]) }}">{{ $bulletin->title }}</a></td>
                        <td>{{ $bulletin->content }}</td>
                        <td>{{ $bulletin->category->title }}</td>
                        <td>{{ $bulletin->created_at }}</td>
                        <td><a href="{{ route('admin.edit', ['bulletin' => $bulletin->id])}}" class="btn btn-link"><i class="bi bi-pencil-square"></i></a></td>
                        <td>
                            <form action="{{route('admin.delete', ['bulletin' => $bulletin->id])}}" method="post" class="form-inline" data-bulletin-id="{{$bulletin->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-link delete-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bulletin-id="{{$bulletin->id}}">
                                    <i class="bi bi-trash3 text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td>No tiene anuncios publicados</td></tr>
                @endforelse
            </tbody>
          </table>
    </div>
</section>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Anuncio</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Esta seguro que quiere eliminar el anuncio?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-secondary text-light" id="confirmDelete">Eliminar</button>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/script.js') }}"></script>
@endsection