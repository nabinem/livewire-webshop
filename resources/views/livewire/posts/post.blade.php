<div>
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header">
                Websockets - First log in as its using private channel, Open two tabs and click publish button and wait 5 seconds to check web socketss in action!
            </div>
            <div class="card-body">
                Reverb Websockets: 
                <a href="https://laracasts.com/series/lukes-larabits/episodes/17" target="_blank">
                    https://laracasts.com/series/lukes-larabits/episodes/17
                </a><br/>
                Uncomment import './echo-reverb' on bootstrap.js file and run npm run build <br/>
                php artisan reverb:start --host="0.0.0.0" --port=8080  <br>
                php artisan queue:listen <br><br>

                Soketi Websockets: 
                <a href="https://www.youtube.com/watch?v=ddG0vtj8Y4I" target="_blank">
                    https://www.youtube.com/watch?v=ddG0vtj8Y4I
                </a><br/>
                Uncomment import './echo-soketi' on bootstrap.js file and run npm run build <br/>
                soketi start  <br>
                php artisan queue:listen <br><br>

                Laravel web sockets:
                <a href="https://github.com/beyondcode/laravel-websockets" target="_blank">
                    Abandoned project only support laravel 9.x, now recommends reverb?? https://github.com/beyondcode/laravel-websockets
                </a>
                
                <a ahref="https://laracasts.com/series/andrews-larabits/episodes/14" target="_blank">
                    https://laracasts.com/series/andrews-larabits/episodes/14
                </a> 

                <a ahref="https://laracasts.com/series/andrews-larabits/episodes/14" target="_blank">
                    https://laracasts.com/series/andrews-larabits/episodes/14
                </a> 
                
                <br> <br>
            </div>
        </div>
    </div>
    <div class="col-md-8 mb-2">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
        @if($addPostMode)
            @include('livewire.posts.create')
        @endif
        @if($updatePostMode)
            @include('livewire.posts.update')
        @endif
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @if(!$addPostMode)
                <button wire:click="addPost()" class="btn btn-primary btn-sm float-right">Add New Post</button>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Published</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($posts) > 0)
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            {{$post->title}}
                                        </td>
                                        <td>
                                            {{$post->description}}
                                        </td>
                                        <td>
                                            {{ $post->published_at?->diffForHumans() ?? 'Not Pulished' }}
                                        </td>
                                        <td>
                                            <button wire:click="editPost({{$post->id}})" class="btn btn-primary btn-sm">Edit</button>
                                            <button wire:click="publishPost({{$post->id}})" class="btn btn-outline-primary btn-sm">Publish</button>
                                            <button onclick="deletePost({{$post->id}})" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No Posts Found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 
</div>

@script
<script>

Echo.private(`App.Models.User.{{ auth()->id() }}`)
    .listen('PostPublished', (event) => {
        $wire.$refresh();
        alert(`${event.post.title} is published`);
        // {{-- const index = podcasts.value.data.findIndex((value) => value.id === event.podcast.id);

        // if (index > -1) {
        //     podcasts.value.data[index].status = event.podcast.status;
        // } --}}
    });
</script>

@endscript