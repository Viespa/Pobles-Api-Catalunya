<div class="w-full">
    <div class="flex flex-wrap">
        <h1 class="mb-5">{{ $title }}</h1>
    </div>
</div>

<form method="POST" action="{{ $route }}" class="needs-validation">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
    <div class="mb-3">
        <label for="nom" class="form-label">{{ __("Nom") }}</label>
        <input name="nom" type="text" class="form-control" value="{{ old("nom") ?? $poble->nom }}">
        @error("nom")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="comarca" class="form-label">{{ __("Comarca") }}</label>
        <input name="comarca" type="text" class="form-control" value="{{ old("comarca") ?? $poble->comarca }}">
        @error("comarca")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="provincia" class="form-label">{{ __("Provincia") }}</label>
        <input name="provincia" type="text" class="form-control" value="{{ old("provincia") ?? $poble->provincia }}">
        @error("provincia")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="descripcio" class="form-label">{{ __("Descripcio") }}</label>
        <input name="descripcio" type="text" class="form-control" value="{{ old("descripcio") ?? $poble->descripcio }}">
        @error("descripcio")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="latitud" class="form-label">{{ __("Latitud") }}</label>
        <input name="latitud" type="text" class="form-control" value="{{ old("latitud") ?? $poble->latitud }}">
        @error("latitud")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="longitud" class="form-label">{{ __("Longitud") }}</label>
        <input name="longitud" type="text" class="form-control" value="{{ old("longitud") ?? $poble->longitud }}">
        @error("longitud")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">{{ __("Imatge") }}</label>
        <input name="img" type="text" class="form-control" value="{{ old("img") ?? $poble->img }}">
        @error("img")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>
    
   

    

    <div class="mb-3">
        <button class="btn btn-primary" type="submit">
            {{ $textButton }}
        </button>
    </div>
</form>