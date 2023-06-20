<div>


    <ul class="list-group">
        @foreach ($announcements as $announcement)
            <li class="list-group-item mt-3">
                <h3>Title: {{ $announcement->title }}</h3>
                <p>Message: {{ $announcement->body }}</p>
                <p>Posted by: {{ $announcement->user->first_name }} {{ $announcement->user->last_name }}</p>
            </li>
        @endforeach
    </ul>
</div>
