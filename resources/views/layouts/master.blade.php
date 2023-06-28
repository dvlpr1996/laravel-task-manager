@include('layouts.header')
@include('layouts.nav')

<section class="relative flex min-h-screen flex-row">

		@include('layouts.sidebar')

		<main>
				@yield('main-content')
		</main>
</section>

@include('layouts.footer')
