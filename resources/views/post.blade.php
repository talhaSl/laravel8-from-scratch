<x-layout>


    <article>
        {{-- {!! $post !!} --}}
        <h1>
            <a href="/post/{{ $post->slug}}">
                {{ $post->title }}
            </a>
        </h1>
        By

        <a href="/author/{{ $post->user->username }}">
            {{ $post->user->name }}
        </a>

        In 
        <a href="/categories/{{ $post->category->slug }}">
            {{ $post->category->name }}
        </a>
        <div>

            {{ $post->excerpt }}
            <br>
            <p>
                {{ $post->body }}
            </p>
            
        </div>
    </article>
    <a href="/">Go Back</a>

</x-layout>
