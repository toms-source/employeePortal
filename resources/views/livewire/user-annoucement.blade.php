<div>
    <ul class="row">
        @foreach ($announcements as $announcement)
        <div class="col-sm-4"> <!-- not "col-sm-3" -->
            <div class="card">
                <div class="card-body">
                    <li class="list-group-item">
                        <h3>Title: {{ $announcement->title }}</h3>
                        <p>Message: {{ $announcement->body }}</p>
                        <p>Posted by: {{ $announcement->user->first_name }} {{ $announcement->user->last_name }}</p>
                    </li>
                </div>
            </div>
        </div>  
        @endforeach
    </ul>
</div>
