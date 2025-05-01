<x-layout>
    <div class="index-wrapper">
        {{--filter for posts--}}
        <aside class="post-filter">
            <h2>Filter Posts</h2>
        </aside>
        {{--display a list of posts--}}
        <section class="post-section">
            <div class="post-pagination">
                {{$posts->links('pagination.index')}}
                <p>Page {{$posts->currentPage()}} of {{$posts->lastPage()}} pages</p>
            </div>
            <div class="post-list">
                @foreach($posts as $post)
                    <x-partial.post-card :post="$post"/>
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
