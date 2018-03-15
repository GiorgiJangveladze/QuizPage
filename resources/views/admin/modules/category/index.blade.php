@extends('admin.layout.index')
@section('content')

		        <!--Warning messages End-->
		        <section class="content-header">
				      <h1>
				        Categories	
				        <small>advanced tables</small>
				      </h1>      
			    </section>

				    <section class="content">
						      <div class="row">
						        <div class="col-xs-12">
						          <div class="box">
						          	<div id="form-errors"></div>
									<div class="box-body">
										     @if(session()->has('success'))
									         <div class="callout callout-info">
									          <h4>Success!</h4>
									         	 <h4>{{session()->get('success')}}</h4>		            
									         </div>
									         @endif
									         <!--Success messages End-->

							            	<!--Warning messages Begin-->
								            	@if(session()->has('errors'))
								            	<div class="callout callout-danger">
										          <h4>Warning!</h4>

										          <ul>
										          	@foreach($errors->all() as $message)
										          		<li>{{ $message }}</li>
										          	@endforeach
										          </ul>
										        </div>
										        @endif

										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>id</th>
													<th>Name</th>
												</tr>
											</thead>
											<tbody>
											@foreach($categories as $category)
												<td>{{$category->id}}</td>
												<td>
													<div class="form-group 	@if ($errors->has('name')) has-error @endif">
													<input type="name" class="form-control" name="name" value="@if(old('name')){{ old('name')}} @else {{ $category->name }} @endif" placeholder="Name">
													</div>
												</td>
												<td>
													<button type="submit" class="btn btn-primary btn-block categoryEdit" rel="{{$category->id}}">Edit</button>
												</td>
											</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</section>

@endsection
@section('footer')