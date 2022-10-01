<nav class="navbar">
		<div class="flex items-center gap-5">
				<i id="sidebarToggle" class="fas fa-bars text-2xl font-semibold"></i>

				<a href="#" class="flex items-center gap-2">
						<img src="{{ asset('img/logo.png') }}" alt="logo" class="h-12 w-12 rounded-full" loading="lazy">
						<span class="hidden md:block">Laravel Task Manager</span>
				</a>
		</div>

		<div class="flex items-center gap-4">
				<i class="fas fa-adjust" id="theme-toggle" x-on:click="darkMode = !darkMode">
				</i>

				<div x-data="dropdown" x-on:click.away="away()" class="relative">
						<button x-on:click="toggle()" class="link">
								<i class="fa fa-caret-down"></i>
								{{ auth()->user()->fullName }}
						</button>

						<div class="dropdown-content hidden" x-show="open" x-transition.duration.500ms
								x-bind:class="{ 'hidden': !open }">

								<x-modal-box>
										<x-slot:modalBtn>
												<p x-on:click="toggle()" class="link m-2 block text-left">
														<i class="fas fa-lock mr-1"></i>
														Settings
												</p>
										</x-slot:modalBtn>

										<x-slot:modalTitle>profile settings</x-slot:modalTitle>

										<x-slot:modalContent>
												<form class="form-wrapper p-4">

														<div>
																<input type="text" placeholder="first name" class="form-control">
														</div>

														<div class="mt-5">
																<input type="text" placeholder="last name" class="form-control">
														</div>

														<div class="mt-5">
																<input type="email" placeholder="email address" class="form-control">
														</div>

														<div class="mt-5">
																<button type="submit" class="btn w-full py-2">
																		save changes
																</button>
														</div>

												</form>
										</x-slot:modalContent>
								</x-modal-box>

								<x-modal-box>
										<x-slot:modalBtn>
												<p x-on:click="toggle()" class="link m-2 block text-left">
														<i class="fas fa-sign-out-alt mr-1"></i>
														password
												</p>
										</x-slot:modalBtn>

										<x-slot:modalTitle>change your password</x-slot:modalTitle>

										<x-slot:modalContent>
												<form class="form-wrapper p-4">
														<div class="mt-5">
																<input type="password" placeholder="current password" class="form-control">
														</div>

														<div class="mt-5">
																<input type="password" placeholder="new password" class="form-control">
														</div>

														<div class="mt-5">
																<input type="password" placeholder="Confirm new password" class="form-control">
														</div>

														<div class="mt-5">
																<button type="submit" class="btn w-full py-2">
																		change password
																</button>
														</div>

												</form>
										</x-slot:modalContent>
								</x-modal-box>

								<hr class="hr">

								<a href="{{ route('logout') }}" class="m-2 block text-left">
										<i class="fas fa-sign-out-alt mr-1"></i>
										Logout
								</a>

						</div>

				</div>
				<img src="#" alt="avatar" class="h-12 w-12 rounded-full" loading="lazy">
		</div>
</nav>