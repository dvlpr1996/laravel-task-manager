// display msg when user is offline
window.addEventListener("load", () => {
	window.addEventListener("offline", () => {
		alert("you appear to be offline!. check your internet connection");
	});
});

// change title when user changes tab
let documentTitle = document.title;

window.addEventListener("blur", () => {
  document.title = "come back :-(";
});

window.addEventListener("focus", () => {
  document.title = documentTitle;
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
