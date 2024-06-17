<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            本検索
        </h2>
    </x-slot>

    <div class="container mx-auto sm:px-4 pt-3">
        <div class="flex flex-wrap  mb-3">
            <div class="lg:w-4/5 pr-4 pl-4 lg:mx-1/6">
                <!-- 検索フォーム -->
                <form method="GET" action="">
                    <div class="mb-3">
                        <p class="fw-bolder">レビューする本を検索してください</p>
                        <input id="search" name="search"
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            placeholder='検索' value="{{ request()->query('search') }}" type="search">
                        <p class=""><small class="text-gray-600">書名・著者等で検索することができます。</small></p>
                    </div>
                    <input type="submit" value="検索"
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">
                </form>
            </div>
        </div>
        <!-- 検索結果 -->
        @empty($googleBooks)
        @else
            <div class="bg-white border rounded-2 px-3 mb-3">
                <p class="py-1 my-2 fw-bolder">検索結果<span class="fw-normal fs-7">　キーワード :
                        {{ request()->query('search') }}</span></p>
            </div>
            <div class="flex flex-wrap ">
                @foreach ($googleBooks['items'] ?? [] as $googleBook)
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
                        <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 mb-3",
                            style="height: 220px; min-width: 300px;">
                            <div class="flex flex-wrap  g-0">
                                <div class="w-2/5">
                                    @php
                                        $src = $googleBook['volumeInfo']['imageLinks'] ? $googleBook['volumeInfo']['imageLinks']['thumbnail'] : asset('sample.png');
                                    @endphp
                                    <img src="{{ $src }}" class="max-w-full h-auto ms-2 mt-2 border book-img">
                                </div>
                                <div class="w-3/5">
                                    <div class="flex-auto p-6">
                                        <h5 class="mb-3">{{ Str::limit($googleBook['volumeInfo']['title'], 30, '...') }}
                                        </h5>
                                        <p class="mb-0 mb-2">
                                            {{ Str::limit(implode(', ', $googleBook['volumeInfo']['authors']), 20, '...') }}
                                        </p>
                                        <p class="mb-0"><small
                                                class="text-gray-700">{{ $googleBook['volumeInfo']['publishedDate'] ?? '' }}</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- link_to '', new_book_path(volumeInfo: set_google_book_params(google_book)), class: 'card-link' --}}
                        </div>
                    </div>
                @endforeach
            </div>
        @endempty
    </div>
</x-app-layout>
