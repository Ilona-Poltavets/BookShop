<div class='row'>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <div class="row mb-3">
                    <label for="name" class="col-2 col-form-label">{{ __('message.name') }}</label>
                    <div class="col-10">
                        <input id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                               type="text"
                               value="{{isset($genre)?$genre->name:old('name')}}"/>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name_ukr" class="col-2 col-form-label">{{ __('message.name_ukr') }}</label>
                    <div class="col-10">
                        <input id="name_ukr" name="name_ukr" class="form-control @error('name') is-invalid @enderror"
                               type="text"
                               value="{{isset($genre)?$genre->name_ukr:old('name_ukr')}}"/>
                        @error('name_ukr')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-2 col-form-label">{{ __('message.photo') }}</label>
                    <div class="col-10">
                        @if(isset($genre))
                            <div class="d-flex flex-row">
                                <img class="img-sm" src="{{ url($genre->img) }}">
                            </div>
                        @endif
                        <input id="image" name="image" class="form-control @error('image') is-invalid @enderror" type="file"/>
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
