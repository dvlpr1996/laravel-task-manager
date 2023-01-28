@include('layouts.header')

@section('pageTitle', strtoupper('404'))

<main class="flex min-h-screen items-center justify-center bg-gray-100 dark:bg-slate-900">
		<div class="text-center text-white">
				<h1 class="text-5xl">Hm, why did you land here somehow?</h1>
				<a href="{{ route('dashboard.index') }}" class="mt-5 inline-block text-xl text-black">
						back to home page
				</a>
		</div>
</main>

@include('layouts.footer')
