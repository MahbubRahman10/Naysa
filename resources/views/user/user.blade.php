@extends('admin.layouts.admin')

@section('title')
	<title>User | Naysabd</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	<div id="category">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="category-head">
						<div class="category-search">
							<input type="text" name="search" id="usersearch" class="form-control" placeholder="Search User">
						</div>
					</div>
				</div>
				<div class="panel-body">
					<ul>
						<li><a href="/oishilab/dashboard">Dashboard</a></li>
						<li>&gt;</li>
						<li><a href="#">User</a></li>
					</ul>

					<div>
						<table class="table table-bordered">
							<thead>
								<th>S.N</th>
								<th>Name</th>
								<th>Email</th>
								<th>Actions</th>
							</thead>
							<?php $i = 0 ?>
							<tbody id="users">
								@foreach($users as $user)
								<?php $i++ ?>
								<tr class="data{{$user->id}}" @if($user->status==0)  style="background:#eee; color:#333; "  @else  @endif >
									<td >{{ $i}}</td>
									<td class="mename{{$user->id}}">{{ $user->name }}</td>
									<td class="memail{{$user->id}}">{{ $user->email }}</td>        
									<td>
										<span class="details{{$user->id}}" style="display: none;"  data-date="{{$user->created_at}}"  data-firstname="{{$user->firstname}}" data-lastname="{{$user->lastname}}"  data-company="{{$user->company}}" data-phone="{{$user->phone}}" data-fax="{{$user->fax}}" data-address="{{$user->address}}" data-city="{{$user->city}}" data-post="{{$user->post}}" data-country="{{$user->country}}"  data-status="{{$user->status}}" ></span>
										<a href="" class="userbtns btn-success" id="viewdata"  data-id="{{$user->id}}" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
										<a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="{{$user->id}}" class="userbtns btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>		
		</div>
	</div>
	
	{{-- View Dialog --}}
	<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	        	<h4 class="modal-title custom_align" id="Heading">Message</h4>
	        </div>
	        <div class="modal-body" id="viewmovie">
	         	<p itemtype="http://schema.org/Person">User Name : 
	         	<span itemprop="name" class="username" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">firstname: 
	         	<span itemprop="name" class="userfirstname" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">Last Name: 
	         	<span itemprop="name" class="userlastname" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">Company: 
	         	<span itemprop="name" class="usercompany" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">Phone: 
	         	<span itemprop="name" class="userphone" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">Fax: 
	         	<span itemprop="name" class="userfax" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">Address: 
	         	<span itemprop="name" class="useraddress" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">City: 
	         	<span itemprop="name" class="usercity" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">Post Office: 
	         	<span itemprop="name" class="userpost" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">Country: 
	         	<span itemprop="name" class="usercountry" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">Email: 
          		<span itemprop="name" class="useremail" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">Department: 
	         	<span itemprop="name" class="userdepartment" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">Message: 
	         	<span itemprop="name" class="usermessage" style="font-size: 17px;"> </span></p><br>
	         	<p itemtype="http://schema.org/Person">Date : 
	         	<span itemprop="name" class="date" style="font-size: 17px;"> </span></p><br>
	        </div>
	      </div>
	    </div>
  	</div>

  	{{-- Delete Dialog --}}
  	<div class="modal fade" id="delete"  tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal" >
	    <div class="modal-dialog">
	     	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	          		<h4 class="modal-title custom_align" id="Heading">Delete Message</h4>
	        	</div>
		        <div class="modal-body">
		         	<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to Delete this Message?</div>
		        </div>
		        <div class="modal-footer ">
		         	<button type="button" id="deletes" data-id="" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
		         	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
		        </div>
	      	</div>
	    </div>
  </div>



@endsection