


@include('dashboard.layouts.header')

<div class="page-wrapper">
	<div class="container">
		<div class="row">

			<div class="col-12">
				<h2 class="main-title">
					تعديل بيانات السلايد:
				</h2>
			</div>
		

			 <form class="form-group col-12" method="POST" enctype="multipart/form-data" action="{{ url('admin/slider/update/'.$slide->id) }}"> 
				@csrf
				<div class="group">
					<label>عنوان السلايد: <span class="require">*</span></label>
					<input type="text" name="slider_title" value="{{ $slide->translate('ar')->title}}" required>
					@if ($errors->has('slider_title'))
						<span class="text-danger">{{ $errors->first('slider_title') }}</span>
					@endif
				</div>
				<div class="group">
					<label>وصف السلايد: <span class="require">*</span></label>
					<input type="text" name="slider_desc" value="{{ $slide->translate('ar')->description}}" required>
					@if ($errors->has('slider_desc'))
						<span class="text-danger">{{ $errors->first('slider_desc') }}</span>
					@endif
				</div>
				<div class="group">
					<label>رابط السلايد:</label>
					<input type="text" name="slider_link" value="{{ $slide->link}}">
					@if ($errors->has('slider_link'))
						<span class="text-danger">{{ $errors->first('slider_link') }}</span>
					@endif
				</div>
				<div class="group">
					<label>صورة السلايد:</label>
					<input type="file" name="img" accept="image/*" id="image">
					@if ($errors->has('img'))
						<span class="text-danger">{{ $errors->first('img') }}</span>
					@endif
					<!-- <img src="{{ asset($slide->img) }}" class="small-img"> -->
				</div>
				<div class="col-md-12 mb-2">
                    <div>
                        <label for="exampleInputFile">عرض الصورة</label>
                        <div class="input-group">
                            <img src="{{ asset($slide->img) }}" class="img-fluid small-img"
                                id="image_preview_container">
                        </div>
                    </div>
                </div>
				
				<div class="group">
					<button type="submit">حفظ</button>
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