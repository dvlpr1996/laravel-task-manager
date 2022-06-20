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
});

window.Alpine = Alpine;
Alpine.start();

// todo : check for offline or online
// todo : system theme with alpine.js
// todo : dark mode in components
