@include('layouts.header')
@include('layouts.nav')

<section class="relative flex">
		<aside id="sidebar" class="sidebar">
				<ul class="mt-5 space-y-5 capitalize text-gray-500 dark:text-gray-400">
						<li class="aside-items">
								<i class="fas fa-tachometer-alt mr-1"></i>
								<a href="dashboard.html">dashboard</a>
						</li>

						<li class="aside-items">
								<i class="fas fa-inbox mr-1"></i>
								<a href="#">inbox</a>
						</li>

						<li class="aside-items">
								<i class="fas fa-star mr-1"></i>
								<a href="#">today</a>
						</li>

						<li class="aside-items">
								<i class="fas fa-calendar-week mr-1"></i>
								<a href="#">tomorrow</a>
						</li>

						<li class="aside-items">
								<i class="fas fa-hashtag mr-1"></i>
								<a href="#">priorities</a>
						</li>

						<li class="aside-items">
								<i class="fas fa-clipboard-list mr-2"></i>
								<a href="#">lists</a>
						</li>

						<li class="aside-items">
								<i class="fas fa-check-circle mr-1"></i>
								<a href="#">completed</a>
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
