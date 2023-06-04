@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <a class="btn btn-secondary" href="{{route('books.create')}}">Add book</a>

        <div class="library">
            @foreach($books as $book)

{{--                <div class="product">--}}
{{--                    <img src="https://placeimg.com/400/400/animals" alt="">--}}
{{--                    <h4 class="product-name">Cotton candy jelly-o gummies</h4>--}}
{{--                    <button class="btn btn-buy">Add to cart</button>--}}
{{--                </div>--}}
{{--                <a class="book" href="{{route('books.show',$book->id)}}">--}}
                    <div class="book">
                        <img alt=""
                             src="{{ count($book->images)>0 ? url($book->first_image_path()) : url('uploads/noimage.jpg') }}">
                        <h4>{{$book->name}}</h4>
                        <p>{{$book->description}}</p>
                        <p class="price">{{$book->price}}</p>
                        <div class="btn-group" role="group">
                            <a class="btn btn-primary" href="{{route('books.show',$book->id)}}">{{__("message.Show")}}</a>
                            @auth()
                                @if( Auth::user()->hasPermission('edit_book') )
                                    <a class="btn btn-primary"
                                       href="{{route('books.edit',$book->id)}}">{{ __('message.edit') }}</a>
                                @endif
                                @if( Auth::user()->hasPermission('delete_book') )
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" data-bs-name="{{$book->name}}"
                                            data-bs-id="{{$book->id}}">
                                        {{ __('message.delete') }}
                                    </button>
                                @endif
                            @endif
                        </div>
                    </div>
{{--                </a>--}}
            @endforeach
        </div>
    </div>
@endsection

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('message.new_message') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <p class="col-form-label">{{ __('message.are_you_sure_you_want_to_delete') }}<b
                            id="recipient-name"></b>?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('message.cancel') }}</button>
                <form id="form_delete" action="" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">{{ __('message.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var name = button.getAttribute('data-bs-name')
        var id = button.getAttribute('data-bs-id')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.modal-body b')
        var modalForm = exampleModal.querySelector('#form_delete')
        modalTitle.textContent = 'Delete ' + name
        modalBodyInput.textContent = name
        modalForm.action = window.location.origin + '/books/' + id
    })
</script>
