
@extends("layouts.default")
@section('content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="/">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="#">Companies</a></li>
</ul>

<div class="row-fluid sortable">
      <div class="box span12">
        <div class="box-header" data-original-title>
          <h2><i class="halflings-icon white user"></i><span class="break"></span>Companies</h2>
          <div class="box-icon">
            {{-- <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a> --}}
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
          </div>
        </div>
        <div class="box-content">
          <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Added</th>
                <th>Updated</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companies as $key => $company)
                <tr class="{{ $key%2==0 ? 'even' : 'odd'}}">
                  <td class="sorting_1">{{$company->name}}</td>
                  <td class="sorting_1">{{$company->email}}</td>
        					<td class="sorting_1">{{$company->contact}}</td>
        					<td class="sorting_1 center">{{$company->created_at->format("Y-m-d")}}</td>
        					<td class="sorting_1 center">{{ $company->updated_at->diffforhumans() }}</td>
                	<td class="center ">
        						<a class="btn btn-success" href="{{$company->show_link}}">
        							<i class="halflings-icon white zoom-in"></i>
        						</a>
        						<a class="btn btn-info" href="{{$company->edit_link}}">
        							<i class="halflings-icon white edit"></i>
        						</a>
                    {!!Form::open(['method'=> "DELETE","url" => $company->delete_link,"style"=>"display:inline"]) !!}
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
@endsection
