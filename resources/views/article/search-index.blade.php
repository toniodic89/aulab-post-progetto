<x-layout>

    <div class="container-fluid p-5 bg-info text-center text-white">
       <div class="row justify-content-center">
           <h1 class="display-1">
               Tutti gli articoli: {{ $query }}
           </h1>

       </div>

    </div>


       <div class="conteiner my-5">
           <div class="row justify-content-center">
               @foreach ($articles as $article)
               <div class="col-12 col-md-3">
                   <x-card
                   title="{{ $article->title }}"
                   subtitle="{{ $article->subtitle }}"
                   image="{{ $article->image }}"
                   category="{{ $article->category ? $article->category->name : '' }}"
                   data="{{ $article->created_at->format('d/m/Y') }}"
                   user="{{ $article->user->name}}"
                   url="{{ route('article.show', compact('article'))}}"
                   urlCategory="{{ $article->category ? route('article.byCategory' , ['category' => $article->category->id ]) : '' }}"
                   urlUser="{{ route('article.byEditor', ['user' => $article->user->id]) }}"
                   readDuration="{{ $article->readDuration() }}"

                   />
               </div>

               @endforeach
           </div>
       </div>
</x-layout>
