@extends('layouts.app')

@section('content')
    <div class="container">
        @if($messages=Session::get('success'))
            <div class="alert alert-success">
                <p>{{$messages}}</p>
            </div>
        @endif
        <a class="btn btn-secondary" href="{{route('publisher.create')}}">{{__('messages.add_publisher')}}</a>
        <table class="table table-dark table-stripped">
            <thead>
            <tr>
                <td>#</td>
                <td>{{ __('messages.image') }}</td>
                <td>{{ __('messages.name') }}</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($publishers as $publisher)
                <tr>
                    <td>
                        {{$publisher->id}}
                    </td>
                    <td>
                        <img class="img-md"
                             src="{{ url($publisher->image) }}">
                    </td>
                    <td>
                        {{$publisher->name}}
                    </td>
                    <td>
                        <div class="btn-group-vertical">
{{--                            <a href="{{route('genres.show',$genre->id)}}"--}}
{{--                               class="btn btn-info">{{ __('message.show') }}</a>--}}
                            <a class="btn btn-warning"
                               href="{{route('publisher.edit',$publisher->id)}}">{{ __('message.edit') }}</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-name="{{$publisher->name}}"
                                    data-bs-id="{{$publisher->id}}">
                                {{ __('message.delete') }}
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
        modalForm.action = window.location.origin + '/publishers/' + id
    })
</script>
