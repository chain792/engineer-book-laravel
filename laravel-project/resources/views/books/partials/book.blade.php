<div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 mb-3", style="height: 350px; min-width: 300px;">
    <div class="flex flex-wrap g-0", style="height: 220px">
        <div class="w-2/5">
            {{-- image_tag book.book_image.url, class: 'img-fluid ms-2 mt-2 border book-img'  --}}
        </div>
        <div class="w-3/5">
            <div class="flex-auto p-6">
                <h5 class="mb-3">{{ Str::limit($book->title, 30, '...') }}</h5>
                {{-- <p class="mb-0 mb-2"> book.authors.pluck(:name).join(', ')&.truncate(20) </p> --}}
                <p class="mb-0"><small class="text-gray-700">{{ $book->published_date }}</small></p>
            </div>
        </div>
    </div>
    <div class="flex border-t pt-2">
        <div>
            {{-- < image_tag book.user.avatar.url, class: 'rounded-circle mt-1 ms-2 me-3', size: '40x40'  --}}
        </div>
        <div>
            <p class="fs-7 mb-1">{{ $book->user->name }}</p>
            <p class="mb-0 mb-2">
                <small class="text-gray-700">{{ $book->created_at }}</small>
                {{-- <span class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-gray-600 ms-1">{{ $book->category.name }}</span> --}}
            </p>
        </div>
    </div>
    <p class="mb-0 mx-3">{{ Str::limit($book->body, 30, '...') }}</p>
    {{-- link_to '', book_path(book), class: 'card-link'  --}}
</div>
