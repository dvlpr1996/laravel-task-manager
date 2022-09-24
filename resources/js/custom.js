window.addEventListener("load", () => {
	window.addEventListener("offline", () => {
		alert("you are seem offline. check your internet connection");
	});
});

// handling sidebar toggle
let sidebarToggle = document.querySelector('#sidebarToggle');
let sidebar = document.querySelector('#sidebar');

sidebarToggle.addEventListener('click', () => {
	(sidebar.style.display === "none") ? sidebar.style.display = "block"
		: sidebar.style.display = "none";
});

// handle side bar
let lg = window.matchMedia("(max-width: 1024px)");
lg.addEventListener('change', (event) => {
	(event.matches) ? sidebar.style.display = "none" : sidebar.style.display = "block";
});
