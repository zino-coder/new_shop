@extends('admin.layouts.layout')

@section('content')
    @include('admin.layouts.components.content-header', ['pageHeader' => 'Account Index'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">List Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md-12">
                                @if(!$accounts->isEmpty())
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">Status</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>DOB</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($accounts as $account)
                                            <tr>
                                                <td class="text-center">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="status-btn-{{ $account->id }}" {{ $account->status ? 'checked' : '' }}>
                                                        <label class="custom-control-label status-btn" for="status-btn-{{ $account->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $account->name }}</td>
                                                <td>{{ $account->username }}</td>
                                                <td>{{ $account->email ?? null }}</td>
                                                <td>{{ $genderArr[$account->gender] }}</td>
                                                <td>{{ $account->birthday->format('d/m/Y') }}</td>
                                                <td>{{ $account->created_at->format('d/m/Y H:i:s') }}</td>
                                                <td class="text-center">
                                                    <a class="d-inline-block btn btn-primary" href="{{ route('accounts.edit', $account->uuid)}}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-modal" data-toggle="modal" data-target="#deleteModal" data-browse="{{ route('accounts.destroy', $account->uuid) }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>No data found</p>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
