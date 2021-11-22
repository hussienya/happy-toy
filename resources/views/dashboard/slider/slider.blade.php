
@include('dashboard.layouts.header')

	<div class="page-wrapper">
		<div class="container">
			<div class="row">

				<div class="col-12">
					<h2 class="main-title">
						السلايدات:
						<a href="{{ url('admin/slider/add') }}">
							<i class="fas fa-plus"></i>
							إضافة سلايد جديد
						</a>
					</h2>
				</div>

				@if(count($slides) == 0)
				<div class="alert alert-info col-12" role="alert">
					لا يوجد سلايدات حالياً لعرضها!
				</div>
				@endif

				@foreach ($slides as $slide)
				<div class="col-md-4 col-sm-6 col-12">
					<div class="guide-block">
						<img src="{{ asset($slide->img) }}" class="img-fluid">
						<h3>{{ $slide->translate('ar')->title }}</h3>
						<p class="product-desc">
							{{Str::limit($slide->translate('ar')->description, 150, $end='...')}}
						</p>
						<ul>
							<li>
								<a href="{{ url('admin/slider/edit/'.$slide->id) }}">
									<i class="fas fa-pencil-alt"></i>
								</a> 
							</li>
							<li>
								<button data-toggle="modal" data-target="{{'#exampleModal'.$slide->id }}">
									<i class="fas fa-trash-alt"></i>
								</button>
							</li>
						</ul>
					</div>
				</div>
				@endforeach

				<div class="col-12">
					{{ $slides->links() }}
				</div>

			</div>
		</div>
	</div>

	@foreach ($slides as $slide)
	<!-- Delete Modal -->
	<div class="modal fade" id="{{'exampleModal'.$slide->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">حذف سلايد</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{url('admin/slider/delete/'.$slide->id)}}">
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