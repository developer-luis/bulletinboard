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
                    <form class="row g-3" action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                          <label for="inputEmail4" class="form-label">Titulo</label>
                          <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="inputEmail4" value="{{old('title')}}">
                          @error('title')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                          @enderror
                        </div>                                               
                        <div class="col-12">
                          <label for="inputAddress" class="form-label">Contentido</label>
                          <textarea name="content" id="" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror" id="inputAddress">{{ old('content') }}</textarea>                          
                          @error('content')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                          @enderror 
                        </div>                    
                        <div class="mb-3">
                          <label for="formFile" class="form-label @error('image') is-invalid @enderror">Seleccione una imagen</label>
                          <input name="image" class="form-control" type="file" id="formFile" required>
                          @error('image')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                          @enderror
                        </div>                        
                        <div class="col-md-6">
                          <label for="inputCity" class="form-label @error('price') is-invalid @enderror">Precio</label>
                          <input name="price" type="number" class="form-control" id="inputCity" value="{{old('price') }}" required>
                          @error('price')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="inputState" class="form-label">Categoria</label>
                          <select name="category" id="inputState" class="form-select">
                            <option selected value="1">Sin Categoria</option>
                            @foreach ($viewData['categories'] as $category)
                                <option value="{{ $category->id}}">{{ $category->title }}</option>
                            @endforeach
                          </select>
                        </div>                      
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary">Publicar Anuncio</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection