@include('layouts.header')
@include('layouts.nav')

<section class="relative flex">
		<aside id="sidebar" class="sidebar">
				<ul class="mt-1 space-y-5">
						<li class="aside-items">
								<i class="fas fa-tachometer-alt mr-1"></i>
								<a href="{{ route('dashboard.index') }}">dashboard</a>
						</li>

						<li class="aside-items">
								<i class="fas fa-inbox mr-1"></i>
								<a href="{{ route('inbox.index') }}">inbox</a>
						</li>

						<li class="aside-items">
								<i class="fas fa-star mr-1"></i>
								<a href="{{ route('today.index') }}">today</a>
						</li>

						<li class="aside-items">
								<i class="fas fa-calendar-week mr-1"></i>
								<a href="{{ route('tomorrow.index') }}">tomorrow</a>
						</li>

						<li class="aside-items">
								<i class="fas fa-hashtag mr-1"></i>
								<a href="#">priorities</a>
						</li>

						<li class="aside-items">
								<i class="fas fa-check-circle mr-1"></i>
								<a href="{{ route('completed.index') }}">completed</a>
						</li>

						<li class="aside-items">
								<i class="fas fa-trash mr-1"></i>
								<a href="#">trash</a>
						</li>
				</ul>
		</aside>

		<main>
				@yield('main-content')
		</main>
</section>

@include('layouts.footer')
