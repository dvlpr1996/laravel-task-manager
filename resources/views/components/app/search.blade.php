<div class="flex flex-col items-center justify-center gap-3 sm:flex-row">
		<x-app.logo />
		<h1>laravel task manager</h1>
</div>

<div class="relative mx-auto sm:w-4/6 md:w-3/5">
		<form action="#" method="GET">
				<input type="text" name="q" class="form-control" placeholder="Search Your Tasks" autocomplete="off"
						value="{{ request()->query('q') }}">
		</form>

		<button type="image" class="pointer-events-none absolute inset-y-0 right-2 flex items-center pl-3">
				<svg class="h-5 w-5 text-gray-500" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd"
								d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
								clip-rule="evenodd"></path>
				</svg>
		</button>
</div>
