<x-layout>
    <div class="index-wrapper">
        {{--filter for posts--}}
        <aside class="post-filter">
            <h2>Filter Posts</h2>
        </aside>
        {{--display a list of posts--}}
        <section class="post-section">
            {{--post pagination--}}
            <div class="post-pagination">
                {{$posts->links('pagination.index')}}
                <p>Page {{$posts->currentPage()}} of {{$posts->lastPage()}} pages</p>
            </div>
            <div class="post-list">
                {{--loop through posts--}}
                @each('post.post-card', $posts, 'post')
            </div>
        </section>
    </div>
</x-layout>
