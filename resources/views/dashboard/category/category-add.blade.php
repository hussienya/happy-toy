@include('dashboard.layouts.header')

<div class="page-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="main-title">
                    إضافة تصنيف جديد:
                </h2>
            </div>
                    <form class="form-group col-12" method="POST" enctype="multipart/form-data" action="{{ route('admin.category.store') }}">

                @csrf
                <div class="group">
                    <label>اسم التصنيف: <span class="require">*</span></label>
                    <input type="text" name="category_title" required>
                    @if ($errors->has('category_title'))
                    <span class="text-danger">{{ $errors->first('category_title') }}</span>
                    @endif
                </div>
                <div class="group">
                    <label>صورة التصنيف: <span class="require">*</span></label>
                    <input type="file" name="img" accept="image/*" id="image" required>
                    @if ($errors->has('img'))
                    <span class="text-danger">{{ $errors->first('img') }}</span>
                    @endif
                </div>
                <div class="col-md-12 mb-2">
                    <div>
                        <label for="exampleInputFile">عرض الصورة</label>
                        <div class="input-group">
                            <img src="{{ asset('/images/image-preview.jpg') }}" class="img-fluid small-img"
                                id="image_preview_container">
                        </div>
                    </div>
                </div>

                <div class="group">
                    <button type="submit">إضافة</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Message -->
@if(session()->has('message'))
<p class="message-box done">
    {{ session()->get('message') }}
</p>
@endif
<!-- ./Message -->

@include('dashboard.layouts.footer')