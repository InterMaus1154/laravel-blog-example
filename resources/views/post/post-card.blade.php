@props(['post'])
<div class="post-card">
    <h3 class="post-title">
        <a href="{{route('post.show', compact('post'))}}">
            {{$post->post_title}}
        </a>
    </h3>
    <p class="post-category">
       Category: {{$post->category->post_category_name}}
    </p>
    <p class="post-author">
        Created by {{$post->author->name}} at {{\Illuminate\Support\Carbon::parse($post->created_at)->toDateString()}}
    </p>
    <p class="post-excerpt">
        {{$post->excerpt}}
    </p>
    <a href="{{route('post.show', compact('post'))}}" class="action-link">Read More</a>
</div>
