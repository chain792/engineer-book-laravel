<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿一覧
        </h2>
    </x-slot>

    <div class="container mx-auto sm:px-4 pt-3">
        <div class="flex flex-wrap ">
            @if($books->isEmpty())
                <p class="mt-3 text-gray-600">レビューされた本はありません。</p>
            @else
                @foreach($books as $book)
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 w-full">
                        @include('books.partials.book', compact('book'))
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
