<h3>Hey, dear {{ $user->fname .' '. $user->lname}}</h3> 
<p>You have selected the following tasks for reminder</p> 
<ul>
	@foreach ($tasks as $task)
		<li>{{ $task->name }}</li>
	@endforeach
</ul>
    
- good luck