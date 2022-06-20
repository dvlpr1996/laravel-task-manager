import Alpine from 'alpinejs';

document.addEventListener('alpine:init', () => {
	Alpine.data('dropdown', () => ({
		open: false,
		toggle() {
			this.open = !this.open
		},
		away() {
			this.open = false
		}
	}));

	Alpine.data('sidebar', () => ({
		sidebarOpen: false,
		toggle() {
			this.sidebarOpen = !this.sidebarOpen
		}
	}));

	Alpine.data('modal', () => ({
		showModal: false,
		toggle() {
			this.showModal = !this.showModal
		},
		close() {
			this.showModal = false
		},
		transition: {
			['x-transition:enter']() {
				return 'motion-safe:ease-out duration-300';
			},
			['x-transition:enter-start']() {
				return 'opacity-0 scale-90';
			},
			['x-transition:enter-end']() {
				return 'opacity-100 scale-100';
			}
		}
	}));
});

window.Alpine = Alpine;
Alpine.start();

// todo : check for offline or online
// todo : system theme with alpine.js
// todo : dark mode in components
