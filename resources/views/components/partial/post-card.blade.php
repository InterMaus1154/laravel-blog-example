@props(['post'])
<div class="post-card">
    <h3 class="post-title">
        <a href="{{route('post.show', compact('post'))}}">
            {{$post->post_title}}
        </a>
    </h3>
</div>
