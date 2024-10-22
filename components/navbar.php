<?php if (empty($key) || $key !== "pytzch") { header('Location: /login'); exit; } ?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #3A1078;">
	<div class="container-fluid py-2">
		<a class="navbar-brand" href="dashboard">
			<i class="bi bi-chevron-double-left"></i>
		</a>
		<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fas fa-bars" id="menu-icon"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ms-auto">
			<li class="nav-item">
				<a href="jadwal" class="nav-link text-center text-white mx-2 rounded-4" style="background-color: #3795BD; width: 100px;" href="#">Jadwal</a>
			</li>
			<li class="nav-item">
				<a href="tugas" class="nav-link text-center text-white mx-2 rounded-4" style="background-color: #3795BD; width: 100px;" href="#">Tugas</a>
			</li>
			<li class="nav-item">
				<a href="settings" class="nav-link text-center text-white mx-2 rounded-4" style="background-color: #3795BD; width: 100px;" href="#">Setting</a>
			</li>
			</ul>
		</div>
	</div>
</nav>