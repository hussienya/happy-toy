


@include('dashboard.layouts.header')

<div class="page-wrapper">
	<div class="container">
		<div class="row">

			<div class="col-12">
				<h2 class="main-title">
					تعديل بيانات المنتج
				</h2>
			</div>
		
			 <form class="form-group col-12" method="POST" enctype="multipart/form-data" action="{{ url('admin/item/update/'.$item->id) }}"> 
				@csrf
				<div class="group">
					<label>اسم المنتج: <span class="require">*</span></label>
					<input type="text" name="item_title" value="{{ $item->name }}" required>
					@if ($errors->has('item_title'))
						<span class="text-danger">{{ $errors->first('item_title') }}</span>
					@endif
				</div>
				<div class="group">
					<label>وصف المنتج: <span class="require">*</span></label>
					<textarea name="item_desc" required>{{ $item->description }}</textarea>
					@if ($errors->has('item_desc'))
						<span class="text-danger">{{ $errors->first('item_desc') }}</span>
					@endif
				</div>
				<div class="group">
					<label>تصنيف المنتج: <span class="require">*</span></label>
					<ul class="radio-choices">
						@foreach ($categories as $category)
						@if ($category->id != 4)
						<li class="radio-box">
							<input type="checkbox" value="{{ $category->id }}" name="category[]">
							@foreach ($item_categories as $item_cat)
							@if ($category->id == $item_cat->category_id)
							<input type="checkbox" value="{{ $category->id }}" checked name="category[]">
							@endif
							@endforeach 
							<span>
								{{ $category->translate('ar')->name }}
							</span>
						</li>
						@endif
						@endforeach
						@if(count($categories) == 1)
						<li class="radio-box">
							<input type="checkbox" value="{{ $categories[0]->id }}" checked disabled name="category[]">
							<span>
								{{ $categories[0]->translate('ar')->name }}
							</span>
						</li>
						@endif
						@if ($errors->has('category'))
							<span class="text-danger">{{ $errors->first('category') }}</span>
						@endif
						@if ($errors->has('category.*'))
							<span class="text-danger">{{ $errors->first('category.*') }}</span>
						@endif
					</ul>
				</div>
				<div class="group">
					<label>عدد القطع: </label>
					<input type="number" name="item_count" value="{{ $item->count }}" min="0">
					@if ($errors->has('item_count'))
						<span class="text-danger">{{ $errors->first('item_count') }}</span>
					@endif
				</div>
				<div class="group">
					<label>سعر المنتج الحالي (بدون تخفيض): <span class="require">*</span></label>
					<input type="number" name="item_price" value="{{ $item->price }}" min="0" required>
					@if ($errors->has('item_price'))
						<span class="text-danger">{{ $errors->first('item_price') }}</span>
					@endif
				</div>
				<div class="group">
					<label>سعر المنتج الجديد (بعد التخفيض): </label>
					<input type="number" name="item_price_new" value="{{ $item->new_price }}" min="0">
					@if ($errors->has('item_price_new'))
						<span class="text-danger">{{ $errors->first('item_price_new') }}</span>
					@endif
				</div>
				<div class="group">
					<label>سعر المنتج الحقيقي (سعر التكلفة): </label>
					<input type="number" name="item_price_real" value="{{ $item->real_price }}" min="0">
					@if ($errors->has('item_price_real'))
						<span class="text-danger">{{ $errors->first('item_price_real') }}</span>
					@endif
				</div>
				<div class="group">
					<label>اسم التاجر:</label>
					<input type="text" name="vendor_name" value="{{ $item->vendor_name }}">
					@if ($errors->has('vendor_name'))
						<span class="text-danger">{{ $errors->first('vendor_name') }}</span>
					@endif
				</div>
				<div class="group two">
					<label> الكود</label>
					<input type="text" name="code" value="{{ $item->code }}">
					@if ($errors->has('code'))
						<span class="text-danger">{{ $errors->first('code') }}</span>
					@endif
				</div>
				<div class="group two">
					<label> الحجم</label>
					<input type="text" name="size" value="{{ $item->size }}">
					@if ($errors->has('size'))
						<span class="text-danger">{{ $errors->first('size') }}</span>
					@endif
				</div>
				<div class="group">
					<label> الخامة الأساسية</label>
					<input type="text" name="source" value="{{ $item->source }}">
					@if ($errors->has('source'))
						<span class="text-danger">{{ $errors->first('source') }}</span>
					@endif
				</div>
				<div class="group">
					<label>محتويات العبوة </label>
					<textarea name="contents" >{{ $item->contents }}</textarea>
					@if ($errors->has('contents'))
						<span class="text-danger">{{ $errors->first('contents') }}</span>
					@endif
				</div>
				<div class="group two">
					<label> الماركة </label>
					<input type="text" name="brand" value="{{ $item->brand }}">
					@if ($errors->has('brand'))
						<span class="text-danger">{{ $errors->first('brand') }}</span>
					@endif
				</div>
				<div class="group two">
					<label> العمر الموصى به </label>
					<input type="text" name="age" value="{{ $item->age }}">
					@if ($errors->has('age'))
						<span class="text-danger">{{ $errors->first('age') }}</span>
					@endif
				</div>
				<div class="group two">
					<label>   بلد الصنع </label>
					<input type="text" name="country" value="{{ $item->country }}">
					@if ($errors->has('country'))
						<span class="text-danger">{{ $errors->first('country') }}</span>
					@endif
				</div>
				<div class="group two">
					<label>  رابط اليوتيوب   </label>
					@if($item->youtube_link)
					<input type="text" name="youtube_link" value="{{ 'https://www.youtube.com/watch?v='.$item->youtube_link }}">
					@else
					<input type="text" name="youtube_link" value="{{ $item->youtube_link }}">
					@endif
					@if ($errors->has('youtube_link'))
						<span class="text-danger">{{ $errors->first('youtube_link') }}</span>
					@endif
				</div>
				<div class="group">
					<label>صور المنتج: </label>
					<div class="row">
						@foreach ($item->images as $img)
							<div class="col-md-4 col-sm-6 col-12">
								<div class="guide-block">
									<img src="{{ asset ($img->img) }}" class="img-fluid">
									<ul>
										<li>
											<button type="button" class="delete-btn" data-toggle="modal" data-target="{{'#exampleModal'.$img->id }}">
												<i class="fas fa-trash-alt"></i>
											</button>
										</li>
									</ul>
								</div>
							</div>
						@endforeach
					</div>
					<label>إضافة صور جديدة: </label>
					<input type="file" name="img[]" accept="image/*" multiple id="item_image">
					<small>يمكن رفع صورة واحدة أو أكثر (يجب أن يكون حجم كل صورة أقل من 2 ميغابايت)</small>
					@if ($errors->has('img'))
						<span class="text-danger">{{ $errors->first('img') }}</span>
					@endif
					@if ($errors->has('img.*'))
						<span class="text-danger">{{ $errors->first('img.*') }}</span>
					@endif
				</div>
				<div id="image_preview"></div>
				<div class="group">
					<button type="submit">حفظ</button>
				</div>
			</form>


		</div>
	</div>
</div>

@foreach ($item->images as $img)
<!-- Delete Modal -->
<div class="modal fade" id="{{'exampleModal'.$img->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">حذف صورة منتج</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{url('admin/item/img/delete/'.$img->id)}}">
				@csrf
					@method('DELETE')
					<p>هل أنت متأكد من الحذف</p>
					<button type="submit">نعم</button>
					<button type="button" data-dismiss="modal" aria-label="Close">
						لا
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- ./Delete Modal -->
@endforeach

<!-- Message -->
@if(session()->has('message'))
<p class="message-box done">
	{{ session()->get('message') }}
</p>
@endif
<!-- ./Message -->

@include('dashboard.layouts.footer')		