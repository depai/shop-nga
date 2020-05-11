@extends('User.Elements.master')
@section('content')
    <div class="page-wrapper mt-3 container">
        <article class="the-article type-text ">
            <header class="the-article-header">
                <p class="the-article-category">
                    <a href="#" class="parent_cate">
                        {{ $post->category->name}}
                    </a>
                </p>
                <h1 class="the-article-title font-weight-bold" style="font-size: 2.6em;">{!! $post->title !!}</h1>
                <ul class="the-article-meta">
                    <li class="the-article-publish"><b style="color: #000">{{ $post->user->name }}</b> đăng lúc {{ date('H:m d/m/Y', strtotime($post->created_at)) }}</li>
                </ul>
            </header>
            <section class="main">
                <div class="the-article-summary">
                    <p>{!! $post->description_short !!}</p>
                </div>
                <div class="the-article-body">
                    <p>{!! $post->description !!}</p>
                </div>
            </section>
            <section class="my-4">
                <p class="font-weight-bold mb-2">Ý KIẾN BẠN ĐỌC</p>
                <form action="{{ route('comment', ['post_id' => $post->id]) }}" method="POST">
                    @csrf
                    <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="Viết bình luận..."></textarea>
                    <button style="margin: 10px 0;" type="submit" class="btn btn-primary mt-2">Gửi bình luận</button>
                </form>
            </section>
            @foreach ($post->comments as $comment)
                <div class="border-top mb-2 comment-parent pt-4 pb-4">
                    {{-- Comment --}}
                    <p class="mb-1 font-weight-bold">{{ $comment->user->name }} {{ $comment->created_at }}</p>
                    <p class="mb-1">{{ $comment->description }}</p>
                    <a href="javascript: void(0)" title="" class="reply mr-3" data-comment-id="{{ $comment->id }}">Trả lời</a>
                    <a href="{{ route('delete_comment', $comment->id) }}">Xóa</a>

                    {{-- Reply --}}
                    @foreach ($comment->replies as $reply)
                        <p class="ml-5 mb-2">
                            <span class="d-block mb-1 font-weight-bold">{{ $reply->user->name }}</span>
                            <span class="d-block mb-1">{{ $reply->description }}</span>
                            <a href="javascript: void(0)" title="" class="reply mr-3" data-comment-id="{{ $comment->id }}">Trả lời</a>
                            <a href="{{ route('delete_reply', $reply->id) }}">Xóa</a>
                        </p>
                    @endforeach
                </div>
            @endforeach
        </article>
    </div>
    <!-- Phonering -->
    <div id="phonering-alo-phoneicon" class="phonering-alo-phone phonering-alo-green phonering-alo-show" >
        <div class="phonering-alo-ph-circle"></div>
        <div class="phonering-alo-ph-circle-fill"></div>
        <a href="tel:0389710456" class="pps-btn-img" title="Liên hệ">
            <div class="phonering-alo-ph-img-circle gtm_e_callhotline"></div>
        </a>
    </div>
    <a id="phonering-alo-phonenum" href="tel:0389710456" class="gtm_e_callhotline">
        0389.710.456</a>

    <div id="phonering-alo-phoneicon" class="phonering-alo-phone phonering-alo-green phonering-alo-show" >
        <div class="phonering-alo-ph-circle"></div>
        <div class="phonering-alo-ph-circle-fill"></div>
        <a href="tel:0389710456" class="pps-btn-img" title="Liên hệ">
            <div class="phonering-alo-ph-img-circle gtm_e_callhotline"></div>
        </a>
    </div>
    <!-- Chat zalo -->
    {{--    <a id="chat-zalo-fixed" title="chat zalo"  class="gtm_e_callhotline"   href="http://zalo.me/0389710456" >Chat Zalo</a>--}}
    <a id="go-home-fixed" title="Quay về trang chủ" href="{{ route('home') }}" ><i class="fa fa-home"></i></a>

    <!-- Preloader -->
    <div style="display: none;" id="tt-preloader">
        <div style="display: none;" id="pre-status">
            <div class="preload-placeholder"></div>
        </div>
    </div>

    <!-- Scroll-up -->
    <div style="display: none;" class="scroll-up">
        <a href="#banner-section" title="Quay về đầu trang"><i class="fa fa-angle-up"></i></a>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".reply").click(function() {
                if ($(this).closest(".comment-parent").find("form").length == 0) {
                    let comment_id = $(this).data("comment-id");
                    let reply =`<form action="{{ route('reply') }}?comment_id=${comment_id}" method="POST" class="ml-4">@csrf<textarea class="form-control mb-2" name="description" id="" cols="30" rows="2" placeholder="Viết phản hồi..."></textarea><button type="submit" class="btn btn-primary">Trả lời</button><button type="button" class="ml-3 btn btn-secondary btn-close-comment" onclick="removeReply($(this))">Đóng</button></form>`;
                    $(this).closest(".comment-parent").append(reply);
                }
            });
        });
        function removeReply(obj) {
            obj.closest("form").remove();
        }
    </script>
@endsection
