<div class="section-title-container">
    <h3 class="section-title section-title-normal">
        <span class="section-title-main">Các bài viết nổi bật</span>
    </h3>
</div>
@foreach($newPosts as $newPost)
    <div class="d-flex post-title">
        @if($newPost->image_thumb)
            <img src="{{ asset('images/post/' . $newPost->image_thumb) }}" class="w-25">
        @endif
        <a href="{{ route('detail_post', $newPost->id) }}" class="color-dark font-weight-bold">
            {!! $newPost->title !!}
        </a>
    </div>
@endforeach
