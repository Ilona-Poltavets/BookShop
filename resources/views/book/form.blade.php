<div class='row'>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <div class="row mb-3">
                    <label for="name" class="col-2 col-form-label">{{ __('message.name')}}</label>
                    <div class="col-10">
                        <input id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                               type="text"
                               value="{{isset($book)?$book->name:old('name')}}"/>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="author" class="col-2 col-form-label">{{ __('message.author')}}</label>
                    <div class="col-10">
                        <input id="author" name="author" class="form-control @error('author') is-invalid @enderror"
                               type="text"
                               value="{{isset($book)?$book->author:old('author')}}"/>
                        @error('author')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-2 col-form-label">{{ __('message.price')}}</label>
                    <div class="col-10">
                        <input id="price" name="price" class="form-control @error('price') is-invalid @enderror"
                               type="number"
                               value="{{isset($book)?$book->price:old('price')}}"/>
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="isbn" class="col-2 col-form-label">{{ __('message.isbn')}}</label>
                    <div class="col-10">
                        <input id="isbn" name="isbn" class="form-control @error('isbn') is-invalid @enderror"
                               type="text"
                               pattern="\d{3,3}-\d{3,3}-\d{3,3}-\d{3,3}-\d{1,1}"
                               value="{{isset($book)?$book->isbn:old('isbn')}}" placeholder="111-222-333-444-5"/>
                        @error('isbn')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="availability" class="col-2 col-form-label">{{ __('message.availability')}}</label>
                    <div class="col-10">
                        <input id="availability" name="availability"
                               class="form-check-input @error('availability') is-invalid @enderror" type="checkbox"
                               {{ isset($book)? ($book->availability==true ? 'checked' : '') :''}} value="1"/>
                        @error('availability')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="img" class="col-2 col-form-label">{{ __('message.photo')}}</label>
                    <div class="col-10">
                        @if(isset($book) && count($book->images)>0)
                            <div class="d-flex flex-row">
                                @foreach( $book->images() as $image)
                                    <img class="img-sm" src="{{$image->path}}">
                                @endforeach
                            </div>
                        @else
                            <img class="img-sm" src="{{url('uploads/noimage.jpg')}}">
                        @endif
                        <input id="img" name="img[]" class="form-control @error('img') is-invalid @enderror" type="file"
                               value="{{isset($book)?$book->file:old('img')}}" multiple/>
                        @error('img')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-2 col-form-label">{{ __('message.description')}}</label>
                    <div class="col-10">
                        <textarea id="description" name="description"
                                  class="form-control @error('description') is-invalid @enderror">{{ isset($book)?$book->description:old('description')}}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
