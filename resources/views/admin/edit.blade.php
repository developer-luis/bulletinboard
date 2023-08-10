@extends('layouts.app')
@section('title', $viewData['title']);
@section('content')
<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-newspaper"></i></div>
                <h1 class="fw-bolder">Crear Anuncio</h1>
                <p class="lead fw-normal text-muted mb-0">Agregar un nuevo anuncio</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <form class="row g-3" action="{{ route('admin.update', ['bulletin' => $viewData['bulletin']->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                          <label for="inputEmail4" class="form-label">Titulo</label>
                          <input name="title" type="text" class="form-control  @error('title') is-invalid @enderror" id="inputEmail4" value="{{$viewData['bulletin']->title}}">
                        </div>                        
                        <div class="col-12">
                          <label for="inputAddress" class="form-label">Contentido</label>
                          <textarea name="content" id="" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror" id="inputAddress">{{$viewData['bulletin']->content}}</textarea>                          
                        </div>
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Seleccione una imagen, actualmente  ({{ $viewData['bulletin']->image }})</label>
                          <input name="image" class="form-control @error('image') is-invalid @enderror" type="file" id="formFile">
                        </div>                        
                        <div class="col-md-6">
                          <label for="inputCity" class="form-label">Precio</label>
                          <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" id="inputCity" value="{{$viewData['bulletin']->price}}">
                        </div>
                        <div class="col-md-6">
                          <label for="inputState" class="form-label">Categoria</label>
                          <select name="category" id="inputState" class="form-select">
                            <option selected value="{{$viewData['bulletin']->category->id}}">{{$viewData['bulletin']->category->title}}</option>
                            @foreach ($viewData['categories'] as $category)
                                <option value="{{ $category->id}}">{{ $category->title }}</option>
                            @endforeach
                          </select>
                        </div>                      
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary">Actualizar Anuncio</button>
                        </div>
                      </form>
                      <a href="{{ route('admin.index') }}" class="mt-5 btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Regresar</a>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection