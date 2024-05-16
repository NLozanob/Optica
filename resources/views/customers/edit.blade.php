@extends('layouts.app')

@section('title','Editar Cliente')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	@include('layouts.partial.msg')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('customers.update',$customer)}}" enctype="multipart/form-data">
                            @csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
									<div class="form-group label-floating">
											<label class="control-label">Nombre<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Nombre" autocomplete="off" value="{{$customer->name}}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Documento<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="identification_document" placeholder="0000" autocomplete="off" value="{{$customer->identification_document}}">
										</div>
                                        <label class="control-label">Dirección<strong style="color:red;">(*)</strong></label>
                                        <div class="form-group label-floating">
                                            <div style="display:flex;">
										        <textarea class="form-control" name="address" rows="2" placeholder="Dirección" value="{{$customer->address}}">{{ old('address', $customer->address) }}</textarea>
                                            </div>
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Telefono<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="phone_number" placeholder="0000000000" autocomplete="off" value="{{$customer->phone_number}}">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Correo<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="email" placeholder="ejemplo@email.com" autocomplete="off" value="{{$customer->email}}">
										</div>								
									</div>
								</div>
								<input type="hidden" class="form-control" name="registerby" value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Editar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('customers.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection