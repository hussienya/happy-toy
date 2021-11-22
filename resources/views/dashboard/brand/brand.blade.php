
@include('dashboard.layouts.header')

	<div class="page-wrapper">
		<div class="container">
			<div class="row">

				<div class="col-12">
					<h2 class="main-title">
						العلامات التجارية:
						<a href="{{ url('admin/brand/add') }}">
							<i class="fas fa-plus"></i>
							إضافة علامة تجارية جديدة
						</a>
					</h2>
				</div>

				@if(count($brands) == 0)
				<div class="alert alert-info col-12" role="alert">
					لا يوجد علامات تجارية حالياً لعرضها!
				</div>
				@endif	

				@foreach ($brands as $brand)
				<div class="col-md-4 col-sm-6 col-12">
					<div class="guide-block">
						<img src="{{ asset($brand->img) }}" class="img-fluid">
						<ul>
							<li>
								<a href="{{ url('/admin/brand/edit/'.$brand->id) }}">
									<i class="fas fa-pencil-alt"></i>
								</a> 
							</li>
							<li>
								<button data-toggle="modal" data-target="{{'#exampleModal'.$brand->id }}">
									<i class="fas fa-trash-alt"></i>
								</button>
							</li>
						</ul>
					</div>
				</div>
				@endforeach

				<div class="col-12">
					{{ $brands->links() }}
				</div>

			</div>
		</div>
	</div>

	@foreach ($brands as $brand)
	<!-- Delete Modal -->
	<div class="modal fade" id="{{'exampleModal'.$brand->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">حذف علامة تجارية</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{url('admin/brand/delete/'.$brand->id)}}">
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