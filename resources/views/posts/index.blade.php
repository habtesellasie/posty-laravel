use App\Models\User;
{{-- @extends('layouts/app') --}}
@extends('layouts.app')

@section('content')
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Posts</h1>
        </div>
    </header>
    <br>
    <div class="flex justify-center">
         <div class="w-full bg-white p-6 rounded-lg">
            <form action="{{route('posts')}}" method="POST">
                @csrf 
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>
                    
                    @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{message}}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                </div>

            </form>

            @if ($posts->count())
                @foreach($posts as $post)
                    <div class="mb-4">
                        <a href="" class="font-bold">
                            {{$post->user->name}}
                        </a>
                        <span class="text-gray-600">
                            {{$post->created_at->diffForHumans()}}
                        </span>
                        <p class="mb-2">
                            {{$post->body}}
                        </p>
                    </div>
                @endforeach
                {{ $posts->links() }}
            @else
                No posts
            @endif
        </div>
    </div>
@endsection