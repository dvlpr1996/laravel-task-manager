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
														<i class="fas fa-plus mr-1"></i>
														new task
												</p>
										</x-slot:modalBtn>

										<x-slot:modalTitle>add your task</x-slot:modalTitle>

										<x-slot:modalContent>
												<form class="form-wrapper space-y-3 p-4" method="POST" action="{{ route('tasks.store') }}">
														@csrf
														<div>
																<input type="text" placeholder="task name" name="name" class="form-control">
														</div>

														<div class="mt-5">
																<x-groups></x-groups>
														</div>

														<div class="mt-5">
																<x-priorities></x-priorities>
														</div>

														<div class="space-y-3">
																<label>chose due time:</label>
																<input type="date" class="form-control" name="due_date">
														</div>

														<div class="flex items-center gap-2">
																<input type="checkbox" class="form-control h-6 w-6 rounded-full" name="reminder" value="1">
																<label>set reminder</label>
														</div>

														<div class="space-y-3">
																<label>task description:</label>
																<textarea name="description" col="10" class="form-control">
														</textarea>
														</div>

														<div class="mt-5">
																<button type="submit" class="btn w-full py-2">
																		add new task
																</button>
														</div>

												</form>
										</x-slot:modalContent>
								</x-modal-box>

								<x-modal-box>
										<x-slot:modalBtn>
												<p x-on:click="toggle()" class="link m-2 block text-left">
														<i class="fas fa-lock mr-1"></i>
														Settings
												</p>
										</x-slot:modalBtn>

										<x-slot:modalTitle>profile settings</x-slot:modalTitle>

										<x-slot:modalContent>
												<form class="form-wrapper p-4" method="POST" action="{{ route('user.update', auth()->user()->id) }}">
														@csrf
														@method('put')
														<div>
																<input type="text" name="fname" value="{{ auth()->user()->fname }}" class="form-control">
														</div>

														<div class="mt-5">
																<input type="text" name="lname" value="{{ auth()->user()->lname }}" class="form-control">
														</div>

														<div class="mt-5">
																<input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control">
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
												<form class="form-wrapper p-4"
												 action="{{ route('user.updatePassword', auth()->user()->id) }}"
														method="POST">
														@csrf
														@method('PUT')
														<div class="mt-5">
																<input type="password" placeholder="current password" class="form-control" name="oldPassword">
														</div>

														<div class="mt-5">
																<input type="password" placeholder="new password" class="form-control" name="newPassword">
														</div>

														<div class="mt-5">
																<input type="password" placeholder="Confirm new password" class="form-control"
																		name="newPassword_confirmation">
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
				<img src="{{ auth()->user()->gravatar() }}" alt="gravatar" title="{{ auth()->user()->fullName }}"
						class="h-12 w-12 rounded-full" loading="lazy">
		</div>
</nav>

<x-auth-validation-errors class="mb-4 bg-red-400 p-4 round" :errors="$errors" />
<x-auth-session-status class="mb-4" :status="session('status')" />
