
@extends("layouts.default")
@section('content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="/">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="#">Users</a></li>
</ul>

<div class="row-fluid sortable">
      <div class="box span12">
        <div class="box-header" data-original-title>
          <h2><i class="halflings-icon white user"></i><span class="break"></span>Members</h2>
          <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
          </div>
        </div>
        <div class="box-content">
          <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Std/Staff Number</th>
                <th>Date registered</th>
                {{-- <th>Role</th> --}}
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $key => $user)
                <tr class="{{ $key%2==0 ? 'even' : 'odd'}}">
        					<td class="sorting_1">{{$user->fullname}}</td>
                  <td class="sorting_1">{{$user->studentnumber}}</td>
        					<td class="sorting_1 center">{{$user->created_at->format("Y-m-d")}}</td>
        					<td class="sorting_1 center">{{ $user->user_type_descr }}</td>
                  
        					<td class="sorting_1 center">
        						<span class="label label-success">{{$user->state->name}}</span>
        					</td>
        					<td class="center ">
        						<a class="btn btn-success" href="{{$user->show_link}}">
        							<i class="halflings-icon white zoom-in"></i>
        						</a>
        						<a class="btn btn-info" href="{{$user->edit_link}}">
        							<i class="halflings-icon white edit"></i>
        						</a>
                    {!!Form::open(['method'=> "DELETE","url" => $user->delete_link,"style"=>"display:inline"]) !!}
                      {{-- <a class="btn btn-s text-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="Are you sure you want to delete this user ?">
                        <span class="glyphicon glyphicon-trash" title="delete"> </span>
                      </a> --}}
                      {{-- <button clas="btn btn-danger" type="submit" name="button"> <i class="halflings-icon white trash"></i></button> --}}
                      <a class="btn btn-danger deleteItem">
                        <i class="halflings-icon white trash"></i>
                      </a>
                    {!! Form::close() !!}
        					</td>
        				</tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div><!--/span-->

    </div><!--/row-->

    @include("modals.delete_confirmation", ["value" => "User"])

{{-- <div class="row-fluid sortable ui-sortable">
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon white user"></i><span class="break"></span>Users</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content" style="display: block;">
			<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div class="row-fluid">
        <div class="span6">
        <div id="DataTables_Table_0_length" class="dataTables_length">
        <label>
          <select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0">
            <option value="10" selected="selected">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select> records per page</label>
        </div>
        </div>
          <div class="span6">
            <div class="dataTables_filter" id="DataTables_Table_0_filter">
              <label>Search: <input type="text" aria-controls="DataTables_Table_0"></label>
            </div>
          </div>
        </div>
        <table class="table table-striped table-bordered bootstrap-datatable datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
			  <thead>
				  <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 253px;">Username</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 365px;">Date registered</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 204px;">Role</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 217px;">Status</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 425px;">Actions</th>
          </tr>
			  </thead>

  		  <tbody role="alert" aria-live="polite" aria-relevant="all">
          @foreach($users as $key => $user)
            <tr class="{{ $key%2==0 ? 'even' : 'odd'}}">
    					<td class=" sorting_1">{{$user->fullname}}</td>
    					<td class="center ">{{$user->created_at->format("Y-m-d")}}</td>
    					<td class="center ">{{$user->user_type->name}}</td>
    					<td class="center ">
    						<span class="label label-success">{{$user->state->name}}</span>
    					</td>
    					<td class="center ">
    						<a class="btn btn-success" href="#">
    							<i class="halflings-icon white zoom-in"></i>
    						</a>
    						<a class="btn btn-info" href="#">
    							<i class="halflings-icon white edit"></i>
    						</a>
    						<a class="btn btn-danger" href="#">
    							<i class="halflings-icon white trash"></i>
    						</a>
    					</td>
    				</tr>
          @endforeach
        </tbody>
    </table>
    <div class="row-fluid">
      <div class="span12">
        <div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to 10 of 32 entries</div>
      </div>
      <div class="span12 center"><div class="dataTables_paginate paging_bootstrap pagination">
        <ul>
          <li class="prev disabled"><a href="#">← Previous</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li class="next"><a href="#">Next → </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
</div><!--/span-->
</div> --}}
@endsection
