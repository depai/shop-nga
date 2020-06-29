@extends('User.Elements.master')
@section('content')
    <div class="page-wrapper mt-3 container">
        <article class="the-article type-text ">
            <header class="the-article-header">
                <p class="the-article-category">
                    <a href="/thoi-su.html" title="Thời sự" class="parent_cate">{{ $post->categories->name }}</a>
                </p>
                <h1 class="the-article-title font-weight-bold" style="font-size: 2.6em;">{!! $post->title !!}</h1>
                <ul class="the-article-meta">
                    <li class="the-article-publish"><b style="color: #000">{{ $post->user->name }}</b> đăng lúc {{ date('H:m d/m/Y', strtotime($post->created_at)) }}</li>
                </ul>
            </header>
            <section class="main">
                <p class="the-article-summary">
                    {!! $post->description_short !!}
                </p>
                <div class="the-article-body">
                    <p>{!! $post->description !!}</p>
                </div>
            </section>
                <div class="mb-4">
                    <h3 class="font-weight-bold mb-2">Ý KIẾN BẠN ĐỌC</h3>
                    <form action="{{ route('comment', ['post_id' => $post->id]) }}" method="POST">
                        @csrf
                        <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="Viết bình luận..."></textarea>
                        <button type="submit" class="btn btn-primary mt-2">Gửi bình luận</button>
                    </form>
                </div>
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
            {{-- </div> --}}


            {{-- <section class="section recommendation has-sidebar">
                <header class="section-title">
                    <h2>Bạn có thể quan tâm</h2>
                    <p class="description"><a href="/thoi-su.html">Thời sự</a></p>
                </header>
                <div class="section-content">
                    <div class="article-list listing-layout responsive">


                        <article class="article-item type-text" article-id="1015794" topic-id="2657">
                            <p class="article-thumbnail">
                                <a href="/hai-phuong-an-khac-phuc-vu-sap-cau-bo-hanh-suoi-tien-post1015794.html">

                                    <img src="https://static-znews.zadn.vn/images/bg_imageloading.jpg"
                                        data-src="https://znews-photo.zadn.vn/Uploaded/kbd_ivdb/2019_11_13/1e00385ae8fd0ea357ec_1.jpg"
                                        alt="Hai phuong an khac phuc vu sap cau bo hanh Suoi Tien hinh anh" />
                                </a>
                            </p>
                            <header>
                                <p class="article-title">
                                    <a href="/hai-phuong-an-khac-phuc-vu-sap-cau-bo-hanh-suoi-tien-post1015794.html">Hai
                                        phương án khắc phục vụ sập cầu bộ hành Suối Tiên</a>
                                </p>
                                <p class="article-meta">
                                    <span class="article-publish">
                                        <span class="friendly-time">41 phút trước</span>
                                        <span class="time">14:03</span>
                                        <span class="date">21/11/2019</span>
                                    </span>


                                    <span class="category-parent">Thời sự</span>



                                    <span class="category">Thời sự</span>

                                </p>
                                <p class="article-count">
                                    <span class="like-count"></span>
                                    <span class="dislike-count"></span>
                                    <span class="rating-count">0</span>
                                    <span class="viral-count hide"></span>
                                    <span class="comment-count hide"></span>
                                </p>
                                <p class="article-summary">Nâng mố trụ cầu hoặc hạ cốt nền mặt đường để đảm bảo độ tĩnh
                                    không 4,75 m là hai phương án chủ đầu tư đưa ra nhằm khắc phục vụ sập dầm cầu vượt Suối
                                    Tiên.</p>

                            </header>
                        </article>

                        <article class="article-item type-video short" article-id="1015685" topic-id="2020,4440">
                            <p class="article-thumbnail">
                                <a href="/video-doi-nam-nu-bi-hat-vang-khi-va-cham-voi-oto-7-cho-post1015685.html">

                                    <span class="duration-video show-time">00:31</span>

                                    <img src="https://static-znews.zadn.vn/images/bg_imageloading.jpg"
                                        data-src="https://znews-gif.zadn.vn/Uploaded/ngotgs/2019_11_21/ezgifcomgifmaker.gif"
                                        alt="Doi nam nu bi hat vang khi va cham voi oto 7 cho hinh anh" />
                                </a>
                            </p>
                            <header>
                                <p class="article-title">
                                    <a href="/video-doi-nam-nu-bi-hat-vang-khi-va-cham-voi-oto-7-cho-post1015685.html">Đôi
                                        nam nữ bị hất văng khi va chạm với ôtô 7 chỗ</a>
                                </p>
                                <p class="article-meta">
                                    <span class="article-publish">
                                        <span class="friendly-time">2 giờ trước</span>
                                        <span class="time">12:56</span>
                                        <span class="date">21/11/2019</span>
                                    </span>


                                    <span class="category-parent">Thời sự</span>



                                    <span class="category">Thời sự</span>

                                </p>
                                <p class="article-count">
                                    <span class="like-count"></span>
                                    <span class="dislike-count"></span>
                                    <span class="rating-count">0</span>
                                    <span class="viral-count ">7</span>
                                    <span class="comment-count ">10</span>
                                </p>
                                <p class="article-summary">Đôi nam nữ bị hất văng xuống đường khi xe máy của họ đâm vào sườn
                                    ôtô 7 chỗ đang chuyển làn.</p>

                            </header>
                        </article>

                        <article class="article-item type-text" article-id="1015765" topic-id="4046">
                            <p class="article-thumbnail">
                                <a
                                    href="/vi-sao-rapper-lil-jon-mang-nhieu-vang-khi-xuat-canh-tan-son-nhat-post1015765.html">

                                    <img src="https://static-znews.zadn.vn/images/bg_imageloading.jpg"
                                        data-src="https://znews-photo.zadn.vn/Uploaded/aobohun/2019_11_21/liljoncrunkaintdeadbling.jpg"
                                        alt="Vi sao rapper Lil Jon mang nhieu vang khi xuat canh Tan Son Nhat? hinh anh" />
                                </a>
                            </p>
                            <header>
                                <p class="article-title">
                                    <a
                                        href="/vi-sao-rapper-lil-jon-mang-nhieu-vang-khi-xuat-canh-tan-son-nhat-post1015765.html">Vì
                                        sao rapper Lil Jon mang nhiều vàng khi xuất cảnh Tân Sơn Nhất?</a>
                                </p>
                                <p class="article-meta">
                                    <span class="article-publish">
                                        <span class="friendly-time">2 giờ trước</span>
                                        <span class="time">12:16</span>
                                        <span class="date">21/11/2019</span>
                                    </span>


                                    <span class="category-parent">Thời sự</span>



                                    <span class="category">Thời sự</span>

                                </p>
                                <p class="article-count">
                                    <span class="like-count"></span>
                                    <span class="dislike-count"></span>
                                    <span class="rating-count">0</span>
                                    <span class="viral-count ">7</span>
                                    <span class="comment-count hide"></span>
                                </p>
                                <p class="article-summary">“Ông vua của dòng nhạc crunk rap” Lil Jon bị hải quan sân bay Tân
                                    Sơn Nhất câu lưu 6 tiếng vì mang quá nhiều vàng.</p>

                            </header>
                        </article>

                        <article class="article-item type-hasvideo picked-trending" article-id="1015670"
                            topic-id="2001,2020,2657,4150,4440">
                            <p class="article-thumbnail">
                                <a href="/nu-sinh-thoat-chet-trong-vu-mercedes-tong-3-xe-may-post1015670.html">

                                    <img src="https://static-znews.zadn.vn/images/bg_imageloading.jpg"
                                        data-src="https://znews-photo.zadn.vn/Uploaded/qxwpzdjwp/2019_11_21/TNGT_4_thumb.jpg"
                                        alt="Nu sinh thoat chet trong vu Mercedes tong 3 xe may hinh anh" />
                                </a>
                            </p>
                            <header>
                                <p class="article-title">
                                    <a href="/nu-sinh-thoat-chet-trong-vu-mercedes-tong-3-xe-may-post1015670.html">Nữ sinh
                                        thoát chết trong vụ Mercedes tông 3 xe máy</a>
                                </p>
                                <p class="article-meta">
                                    <span class="article-publish">
                                        <span class="friendly-time">3 giờ trước</span>
                                        <span class="time">12:06</span>
                                        <span class="date">21/11/2019</span>
                                    </span>


                                    <span class="category-parent">Thời sự</span>



                                    <span class="category">Thời sự</span>

                                </p>
                                <p class="article-count">
                                    <span class="like-count"></span>
                                    <span class="dislike-count"></span>
                                    <span class="rating-count">0</span>
                                    <span class="viral-count hide"></span>
                                    <span class="comment-count ">9</span>
                                </p>
                                <p class="article-summary">Đang trên đường đi dự lễ 20/11, Hồng Nhung bị chiếc Mercedes GLC
                                    250 tông từ phía sau. Cú đâm khiến nữ sinh văng xuống đất, chấn thương cột sống.</p>

                            </header>
                        </article>

                        <article class="article-item type-text" article-id="1015732" topic-id="2208">
                            <p class="article-thumbnail">
                                <a href="/chu-tich-ha-noi-khong-giao-du-an-cho-chu-dau-tu-tung-sai-pham-post1015732.html">

                                    <img src="https://static-znews.zadn.vn/images/bg_imageloading.jpg"
                                        data-src="https://znews-photo.zadn.vn/Uploaded/lexw/2019_11_21/ba7a8a11f05b0905504a_thumb.jpg"
                                        alt="Chu tich Ha Noi: Khong giao du an cho chu dau tu tung sai pham hinh anh" />
                                </a>
                            </p>
                            <header>
                                <p class="article-title">
                                    <a
                                        href="/chu-tich-ha-noi-khong-giao-du-an-cho-chu-dau-tu-tung-sai-pham-post1015732.html">Chủ
                                        tịch Hà Nội: Không giao dự án cho chủ đầu tư từng sai phạm</a>
                                </p>
                                <p class="article-meta">
                                    <span class="article-publish">
                                        <span class="friendly-time">3 giờ trước</span>
                                        <span class="time">12:05</span>
                                        <span class="date">21/11/2019</span>
                                    </span>


                                    <span class="category-parent">Thời sự</span>



                                    <span class="category">Thời sự</span>

                                </p>
                                <p class="article-count">
                                    <span class="like-count"></span>
                                    <span class="dislike-count"></span>
                                    <span class="rating-count">0</span>
                                    <span class="viral-count hide"></span>
                                    <span class="comment-count hide"></span>
                                </p>
                                <p class="article-summary">Chủ tịch Nguyễn Đức Chung yêu cầu không cho nhà đầu tư đã hoặc
                                    đang vi phạm trong đầu tư, quản lý dự án chung cư được tham gia đầu tư các dự án mới
                                    trên địa bàn TP.</p>

                            </header>
                        </article>

                        <article class="article-item type-text short" article-id="1015713" topic-id="4150">
                            <p class="article-thumbnail">
                                <a href="/xe-tai-cuon-2-vo-chong-vao-gam-post1015713.html">

                                    <img src="https://static-znews.zadn.vn/images/bg_imageloading.jpg"
                                        data-src="https://znews-photo.zadn.vn/Uploaded/ngotgs/2019_11_21/74839057_722070824948728_6470056713151053824_n.jpg"
                                        alt="Xe tai cuon 2 vo chong vao gam hinh anh" />
                                </a>
                            </p>
                            <header>
                                <p class="article-title">
                                    <a href="/xe-tai-cuon-2-vo-chong-vao-gam-post1015713.html">Xe tải cuốn 2 vợ chồng vào
                                        gầm</a>
                                </p>
                                <p class="article-meta">
                                    <span class="article-publish">
                                        <span class="friendly-time">3 giờ trước</span>
                                        <span class="time">11:44</span>
                                        <span class="date">21/11/2019</span>
                                    </span>


                                    <span class="category-parent">Thời sự</span>



                                    <span class="category">Thời sự</span>

                                </p>
                                <p class="article-count">
                                    <span class="like-count"></span>
                                    <span class="dislike-count"></span>
                                    <span class="rating-count">0</span>
                                    <span class="viral-count hide"></span>
                                    <span class="comment-count ">1</span>
                                </p>
                                <p class="article-summary">Ông Chung đèo vợ trên xe máy trên quốc lộ 32, đoạn qua huyện Hoài
                                    Đức, thì bị một xe tải đâm từ phía sau. Cả hai tử vong tại chỗ.</p>

                            </header>
                        </article>

                        <article class="article-item type-video short" article-id="1015697" topic-id="2209,2657">
                            <p class="article-thumbnail">
                                <a href="/video-oto-hyundai-tong-4-xe-may-dung-cho-den-do-post1015697.html">

                                    <span class="duration-video show-time">00:35</span>

                                    <img src="https://static-znews.zadn.vn/images/bg_imageloading.jpg"
                                        data-src="https://znews-photo.zadn.vn/Uploaded/jugtzb/2019_11_21/TN1.jpg"
                                        alt="Oto Hyundai tong 4 xe may dung cho den do hinh anh" />
                                </a>
                            </p>
                            <header>
                                <p class="article-title">
                                    <a href="/video-oto-hyundai-tong-4-xe-may-dung-cho-den-do-post1015697.html">Ôtô Hyundai
                                        tông 4 xe máy dừng chờ đèn đỏ</a>
                                </p>
                                <p class="article-meta">
                                    <span class="article-publish">
                                        <span class="friendly-time">3 giờ trước</span>
                                        <span class="time">11:37</span>
                                        <span class="date">21/11/2019</span>
                                    </span>


                                    <span class="category-parent">Thời sự</span>



                                    <span class="category">Thời sự</span>

                                </p>
                                <p class="article-count">
                                    <span class="like-count"></span>
                                    <span class="dislike-count"></span>
                                    <span class="rating-count">0</span>
                                    <span class="viral-count ">1</span>
                                    <span class="comment-count ">3</span>
                                </p>
                                <p class="article-summary">Sáng 21/11, nhiều người dân đang chờ đèn đỏ ở ngã tư Phan Thanh -
                                    Nguyễn Văn Linh (quận Thanh Khê) bị ôtô hiệu Hyundai biển số Đà Nẵng tông từ phía sau.
                                </p>

                            </header>
                        </article>

                        <article class="article-item type-text" article-id="1015690" topic-id="">
                            <p class="article-thumbnail">
                                <a href="/giai-cuu-11-nguoi-gap-nan-do-tau-mac-can-tren-bien-post1015690.html">

                                    <img src="https://static-znews.zadn.vn/images/bg_imageloading.jpg"
                                        data-src="https://znews-photo.zadn.vn/Uploaded/obfsvun/2019_11_21/aa.jpg"
                                        alt="Giai cuu 11 nguoi gap nan do tau mac can tren bien hinh anh" />
                                </a>
                            </p>
                            <header>
                                <p class="article-title">
                                    <a href="/giai-cuu-11-nguoi-gap-nan-do-tau-mac-can-tren-bien-post1015690.html">Giải cứu
                                        11 người gặp nạn do tàu mắc cạn trên biển</a>
                                </p>
                                <p class="article-meta">
                                    <span class="article-publish">
                                        <span class="friendly-time">3 giờ trước</span>
                                        <span class="time">11:31</span>
                                        <span class="date">21/11/2019</span>
                                    </span>


                                    <span class="category-parent">Thời sự</span>



                                    <span class="category">Thời sự</span>

                                </p>
                                <p class="article-count">
                                    <span class="like-count"></span>
                                    <span class="dislike-count"></span>
                                    <span class="rating-count">0</span>
                                    <span class="viral-count hide"></span>
                                    <span class="comment-count hide"></span>
                                </p>
                                <p class="article-summary">Biển động mạnh làm tàu chao lắc và nghiêng, có nguy cơ bị chìm
                                    khiến thuyền viên hoảng loạn. Tàu cứu hộ đã kịp thời ứng cứu thành công 11 người và đưa
                                    vào bờ.</p>

                            </header>
                        </article>
                    </div>
                </div>
            </section> --}}
        </article>

    </div>
    <div id="article-nextreads" data-source="/trending.html"></div>
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
