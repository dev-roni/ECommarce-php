<!-- Custom JS -->

document.getElementById('toggleSidebar').addEventListener('click', function () {
	var sidebar = document.getElementById('sidebar');
	var content = document.getElementById('content');
	sidebar.classList.toggle('show');
	content.classList.toggle('shifted');
});

// Toggle dropdown menus when clicked
document.querySelectorAll('.dropdown-toggle').forEach(function (dropdown) {
	dropdown.addEventListener('click', function (e) {
		var menu = e.target.nextElementSibling;
		menu.classList.toggle('show');
	});
});
