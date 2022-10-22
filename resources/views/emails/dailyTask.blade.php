<h3>Hey, dear {{ $user->fname .' '. $user->lname}}</h3> 
<p>You Have Some Tasks To Do for {{ Carbon\Carbon::now()->toFormattedDateString() }}</p> 
<ul>
	@foreach ($tasks as $task)
		<li>{{ $task->name }}</li>
	@endforeach
</ul>
    
- good luck