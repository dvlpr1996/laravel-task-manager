<div {{ $attributes->merge(['class' => 'flex items-center gap-2']) }}>
		<p>Sort :</p>
		<a href="?sort=ascending">
				<i class="fas fa-sort-alpha-down ml-1"></i> AS
		</a>
		<a href="?sort=descending">
				<i class="fas fa-sort-alpha-down-alt ml-1"></i> DS
		</a>
		<a href="?sort=dueDate">
				<i class="fas fa-stopwatch ml-1"></i> Due date
		</a>
</div>
