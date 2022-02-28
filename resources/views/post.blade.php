<x-layout>
    @foreach($hello2 as $hello)
    <article>
        <h1>
            <a href="/hello2/{{$hello->slug}}">
            </a>


        </h1>
        <div>
            {{$hello->excerpt}}
        </div>
    </article>
    @endforeach
</x-layout>