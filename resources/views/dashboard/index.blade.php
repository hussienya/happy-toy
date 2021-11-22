
@include('dashboard.layouts.header')

<div class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="info-box">
					<i class="fas fa-box"></i>
					<p>
						<span>{{ $items_count }}</span>  
						منتج
					</p>
					<ul>
						<li>
							<a href="{{ url('/admin/items') }}">
								<i class="far fa-eye"></i>
								عرض الكل
							</a>
						</li>
						<li>
							<a href="{{ url('/admin/item/add') }}">
								<i class="fas fa-plus-circle"></i>
								إضافة منتج جديد							
							</a>
						</li>
					</ul>
				</div>
			</div>
			
			
			<div class="col-md-6 col-12">
				<div class="info-box">
					<i class="fas fa-users"></i>
					<p>
						<span>{{ $users_count }}</span>  
						زبون مسجل
					</p>
					
					<ul>
						<li style="visibility: hidden">
							<a href="#">
								<i class="far fa-eye"></i>
								عرض الكل
							</a>
						</li>
					</ul>
					
				</div>
			</div>
			
		</div>
	</div>
</div>
			
@include('dashboard.layouts.footer')		