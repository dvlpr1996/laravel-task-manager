<div x-data="modal" x-on:keydown.escape="close()" x-on:click.away="close()">
	{{ $modalBtn }}
	<div class="modal-wrapper" x-show="showModal">
			<div class="modal-content hidden" x-on:click.away="close()" x-bind:class="{ 'hidden': !showModal }"
					x-bind="transition">
					<div class="flex items-center justify-between">
							<h3>{{ $modalTitle }}</h3>
							<span x-on:click="close()" class="cursor-pointer font-bold text-red-600 hover:text-rose-700">
									X
							</span>
					</div>

					{{ $modalContent}}

			</div>
	</div>

</div>