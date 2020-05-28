@extends('layouts.dashboard')
@section('title', 'All Members')
@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <h2 class="page-title">Our Members</h2>
                <a href="#" class="btn btn-text-secondary float-right">Get Info</a>
                <a href="#" class="btn btn-text-danger float-right m-r-sm">Print</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h5 class="card-title">Responsive Tables</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" placeholder="Search Member">
                                        </div>
                                    </div>
                                    <p>Responsive tables allow tables to be scrolled horizontally with ease. Make any table responsive across all viewports by wrapping a <code>.table</code> with <code>.table-responsive</code>.</p>
                                    <div class="table-container">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">S/N</th>
                                                        <th scope="col">Full Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Phone Contact</th>
                                                        <th scope="col">Admin Approved</th>
                                                        <th scope="col">Guarantor Approved</th>
                                                        <th scope="col">Member Position</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if ($members->count() >= 1)
                                                    @foreach ($members as $member)
                                                        <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>{{ ucfirst($member['first_name']) }} {{ ucfirst($member['last_name']) }}</td>
                                                            <td>{{ ucfirst($member['email']) }}</td>
                                                            <td>{{ ucfirst($member['phone']) }}</td>
                                                            <td> @if($member['admin_approved'] === 0)
                                                                    In Review...
                                                                @else
                                                                     Approved
                                                                @endif
                                                            </td>
                                                            <td> @if($member['guarantor_approved'] === 0)
                                                                    In Review...
                                                                @else
                                                                     Approved
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @foreach($member['role'] as $role)
                                                                    {{ucfirst($role)}}
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-secondary dropdown-toggle waves-effect waves-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Actions
                                                                        </button>
                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -132px, 0px);">
                                                                            <a class="dropdown-item" href="#">View Application</a>
                                                                            <a class="dropdown-item" href="#">View Profile</a>
                                                                            <a class="dropdown-item" href="#">Edit Position</a>
                                                                        </div>
                                                                    </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
@endsection
