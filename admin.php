<?php CandyCart::checkSettings() ?>
<div class="tabview">
	
	<?php if (!isset($_GET['tab'])) : ?>

	<h1 class="left">Products</h1>
	<a href="dashboard.php?page=candyCart&newproduct" class="button right">Add New Product +</a>

	<?php elseif($_GET['tab'] == 'categories') : ?>

	<h1 class="left">Categories</h1>
	<a href="dashboard.php?page=candyCart&newproduct" class="button right">Add New Category +</a>

	<?php elseif($_GET['tab'] == 'purchases') : ?>

	<h1 class="left">Purchases</h1>

	<?php elseif($_GET['tab'] == 'settings') : ?>

	<h1 class="left">Settings</h1>
	
	<?php else : ?>

	<h1>Error 404</h1>
	<p class="leadin">Page not found!</p>

	<?php endif; ?>
</div>
<ul class="tablist">
	<li class="products">
		<a href="dashboard.php?page=candyCart">Products</a>
	</li>
	<li class="categories">
		<a href="dashboard.php?page=candyCart&tab=categories">Categories</a>
	</li>
	<li class="purchases">
		<a href="dashboard.php?page=candyCart&tab=purchases">Purchases</a>
	</li>
	<li class="settings">
		<a href="dashboard.php?page=candyCart&tab=settings">Settings</a>
	</li>
</ul>