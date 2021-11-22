
@include('dashboard.layouts.header')

	<div class="page-wrapper">
		<div class="container">
			<div class="row">

				<div class="col-12">
					<h2 class="main-title">
						المنتجات:
						<a href="{{ url('admin/item/add') }}">
							<i class="fas fa-plus"></i>
							إضافة منتج جديد
						</a>
					</h2>
				</div>

				@if(count($items) == 0)
				<div class="alert alert-info col-12" role="alert">
					لا يوجد منتجات حالياً لعرضها!
				</div>
				@endif

				@foreach ($items as $item)
				<div class="col-md-4 col-sm-6 col-12">
					<div class="guide-block">
						<img src="{{ asset($item->images[0]->img) }}" class="img-fluid">
						<h3>{{ $item->translate('ar')->name }}</h3>
						<ul>
							<li>
								<a href="{{ url('admin/item/edit/'.$item->id) }}">
									<i class="fas fa-pencil-alt"></i>
								</a> 
							</li>
							<li>
								<button data-toggle="modal" data-target="{{'#exampleModal'.$item->id }}">
									<i class="fas fa-trash-alt"></i>
								</button>
							</li>
						</ul>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>

	@foreach ($items as $item)
	<!-- Delete Modal -->
	<div class="modal fade" id="{{'exampleModal'.$item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">حذف منتج</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{url('admin/item/delete/'.$item->id)}}">
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