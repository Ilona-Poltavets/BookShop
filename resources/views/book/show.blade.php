@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="path"></div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6">
                <a href="{{ count($book->images)>0 ? url($book->first_image_path()) : url('uploads/noimage.jpg') }}"
                   data-fancybox="single" data-caption="Single #1">
                    <img
                        src="{{ count($book->images)>0 ? url($book->first_image_path()) : url('uploads/noimage.jpg') }}"/>
                </a>
                <div class="d-flex flex-row">
                    @php($images=$book->getImages())
                    @foreach($images as $image)
                        <a
                            data-fancybox="gallery"
                            data-src="{{ url($image->path) }}"
                        >
                            <img class="img-sm" src="{{url($image->path)}}" alt="">
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <h5 class="book-name">{{$book->name}}</h5>
                <p class="short-desc">{{$book->description}}</p>

                <div class="col-md-6">
                    <p>{{ __('message.price') }}: {{ number_format($book->price, 2, '.', '') }}</p>
                    <form action="{{ route('basket.add', ['id' => $book->id]) }}"
                          method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">{{ __('message.add_to_basket') }}</button>
                    </form>
                </div>

                <p class="available-status">
                    @if($book->availability==true)
                        <i class="fa-solid fa-circle green"></i>
                    @else
                        <i class="fa-solid fa-circle grey"></i>
                    @endif
                    {{ __("message.availability") }}</p>
            </div>

            @auth()
                <div class="rating">
                    <div class="stars">
                        <div class="on" style="width: {{ \App\Services\Utility::averageRaitingBookInProcent($book->id) }}%;"></div>
                        <div class="live">
                            <span data-rate="1"></span>
                            <span data-rate="2"></span>
                            <span data-rate="3"></span>
                            <span data-rate="4"></span>
                            <span data-rate="5"></span>
                        </div>
                    </div>
                </div>
                <div class="comments-block">
                    <form method="POST" action="{{ route('addComment',$book->id) }}">
                        @csrf
                        @method('POST')
                        <textarea class="form-control" name="commentText"></textarea>
                        <button type="submit" class="btn btn-success">{{ __('message.send') }}</button>
                    </form>
                    <div class="comments">
                        @foreach($comments as $comment)
                            <div class="comment">

                                <div class="comment-user">
                                    @if( $comment->user->img!=null )
                                        <img src="{{ url($comment->user->img) }}" alt=""/>
                                    @else
                                        <img src="{{ url('uploads/user.jpg') }}" alt=""/>
                                    @endif
                                    <p>{{ $comment->user->name }}</p>
                                    <p class="time">{{ $comment->created_at }}</p>
                                </div>
                                <p class="text">{{ $comment->text }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.stars span').on('click', function () {
                var book_id = <?= $book->id ?>;
                var rating = $(this).data('rate');

                console.log(book_id);

                $.ajax({
                    url: '/rating/update',
                    method: 'POST',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        book_id: book_id,
                        rating: rating
                    },
                    success: function (response) {
                        var updatedRating = response.rating;
                        $('.stars .on').css('width', updatedRating + '%');
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
