<div class="card img-fluid img-thumbnail  ">
    <img src="{{ Storage::url($image) }}" alt="" class="card-img-top img-thumbnail img-resized">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $subtitle }}</p>
        @if ($category)
        <a href="{{ $urlCategory}}" class="small text-muted d-flex justify-content-center align-items-center">{{ $category }}</a>
        @else
            <p class=" small text-muted fst-italic text-capitalize ">
                Non categorizzato
            </p>
        @endif
            <span class=" text-muted small fst-italic">Tempo di lettura {{ $readDuration }} min</span>
        @if ($tags)
        <p class="small fst-italic text-capitalize ">
            @foreach ($tags as $tag)
                #{{ $tag->name }}
            @endforeach
        </p>
        @endif

    </div>
    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
        Redatto il {{ $data }} da <a href="{{ $urlUser }}"> {{ $user }} </a>
        <a href="{{ $url }}" class="btn btn-info text-white m-2">Leggi</a>
    </div>
</div>
