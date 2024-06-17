@if(session('message'))
	<div>
        <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800">
            {{ session('message') }}
        </div>
	</div>
@endif
