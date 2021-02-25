
<form class="d-flex" action="{{route('search')}}">
        <input class="form-control me-2" name="q" value="{{old('q'), request()->q}}" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
    @error('q')
    <div>{{$message}}</div>
    @enderror
</form>
