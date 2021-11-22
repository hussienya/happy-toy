
@include('dashboard.layouts.header')

	<div class="page-wrapper">
		<div class="container">
			<div class="row">

				<div class="col-12">
					<h2 class="main-title">
						التصنيفات:
						<a href="{{ url('admin/category/add') }}">
							<i class="fas fa-plus"></i>
							إضافة تصنيف جديد
						</a>
					</h2>
				</div>

				@foreach ($categories as $category)
				<div class="col-md-4 col-sm-6 col-12">
					<div class="guide-block">
						<img src="{{ asset($category->img) }}" class="img-fluid">
						<h3>{{ $category->translate('ar')->name }}</h3>
						<ul>
							@if($category->id != 4)
							<li>
								<a href="{{ url('/admin/category/edit/'.$category->id) }}">
									<i class="fas fa-pencil-alt"></i>
								</a> 
							</li>
							<li>
								<button data-toggle="modal" data-target="{{'#exampleModal'.$category->id }}">
									<i class="fas fa-trash-alt"></i>
								</button>
							</li>
							@endif
							<li>
								<a href="{{ url('/admin/category/item/'.$category->id) }}">
									<i class="far fa-eye"></i>
									<span class="hint">عرض منتجات هذا التصنيف</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				@endforeach

				<div class="col-12">
					{{ $categories->links() }}
				</div>

			</div>
		</div>
	</div>

	@foreach ($categories as $category)
	<!-- Delete Modal -->
	<div class="modal fade" id="{{'exampleModal'.$category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">حذف تصنيف</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{url('admin/category/delete/'.$category->id)}}">
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