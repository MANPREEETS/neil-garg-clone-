@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Edit Product</h5>
        <div class="card-body">
            <form method="post" action="{{ route('product.update', $product->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                        value="{{ $product->title }}" class="form-control" required>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="summary" class="col-form-label">Additional Information <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="summary" name="summary" required>{{ $product->summary }}</textarea>
                    @error('summary')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="is_featured">Is Featured</label><br>
                    <input type="checkbox" name='is_featured' id='is_featured' value='{{ $product->is_featured }}'
                        {{ $product->is_featured ? 'checked' : '' }}> Yes
                </div>
                {{-- {{$categories}} --}}

                <div class="form-group">
                    <label for="cat_id">Category <span class="text-danger">*</span></label>
                    <select name="cat_id" id="cat_id" class="form-control" required>
                        <option value="">--Select any category--</option>
                        @foreach ($categories as $key => $cat_data)
                            <option value='{{ $cat_data->id }}' {{ $product->cat_id == $cat_data->id ? 'selected' : '' }}>
                                {{ $cat_data->title }}</option>
                        @endforeach
                    </select>
                </div>
                @php
                    $sub_cat_info = DB::table('categories')
                        ->select('title')
                        ->where('id', $product->child_cat_id)
                        ->get();
                    // dd($sub_cat_info);
                @endphp
                {{-- {{$product->child_cat_id}} --}}
                <div class="form-group {{ $product->child_cat_id ? '' : 'd-none' }}" id="child_cat_div">
                    <label for="child_cat_id">Sub Category</label>
                    <select name="child_cat_id" id="child_cat_id" class="form-control">
                        <option value="">--Select any sub category--</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="price" class="col-form-label">Price </label>
                    <input id="price" type="text" name="price" placeholder="Enter price"
                        value="{{ $product->price }}" class="form-control" >
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                class="btn btn-primary text-white">
                                <i class="fas fa-image"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo"
                            value="{{ $product->photo }}" required>
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="size">Size</label>
                    <input id="size" type="text" name="size" placeholder="Enter size" value="{{ $product->size }}" class="form-control">
                    @error('size')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="brand_id">Brand</label>
                    <select name="brand_id" class="form-control" required>
                        <option value="">--Select Brand--</option>
                        @foreach ($brands as $brand)
                            <option {{ ($product->brand->id == $brand->id) ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->title }}</option>
                        @endforeach
                    </select>
                </div>

                @php($specifications = $product->specifications)
                @if($specifications != null)
                    <div class="form-group">
                        <label>Edit product Specifications</label>
                        <table class="table table-responsive">
                            @php($specifications = unserialize($specifications))
                            @if(count($specifications) > 0)
                                @foreach ($specifications as $item)
                                <tr>
                                    <td><input type="text" class="form-control" value="{{ $item['key'] }}" name="spec_keys[]" placeholder="Key"></td>
                                    <td><input type="text" class="form-control" value="{{ $item['value'] }}" name="spec_values[]" placeholder="Value"></td>
                                </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                @endif

                <div class="form-group">
                    <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Write additional info.....",
                tabsize: 2,
                height: 150
            });
        });
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write detail Description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>

    <script>
        var child_cat_id = '{{ $product->child_cat_id }}';
        // alert(child_cat_id);
        $('#cat_id').change(function() {
            var cat_id = $(this).val();

            if (cat_id != null) {
                // ajax call
                $.ajax({
                    url: "/admin/category/" + cat_id + "/child",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (typeof(response) != 'object') {
                            response = $.parseJSON(response);
                        }
                        var html_option = "<option value=''>--Select any one--</option>";
                        if (response.status) {
                            var data = response.data;
                            if (response.data) {
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data, function(id, title) {
                                    html_option += "<option value='" + id + "' " + (
                                            child_cat_id == id ? 'selected ' : '') + ">" +
                                        title + "</option>";
                                });
                            } else {
                                console.log('no response data');
                            }
                        } else {
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);

                    }
                });
            } else {

            }

        });
        if (child_cat_id != null) {
            $('#cat_id').change();
        }
    </script>
@endpush