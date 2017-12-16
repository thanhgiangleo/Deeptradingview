@extends('admin.partials.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Striped Table with Hover</h4>
                            <p class="category">Here is a subtitle for this table</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Email</th>
                                <th>Payment Code</th>
                                <th>Current Type</th>
                                <th>Upgrade Type</th>
                                <th>Payment Type</th>
                                <th>Payment Currency</th>
                                <th>Proof</th>
                                <th>Option</th>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td> {{ $user->email }}</td>
                                        <td> {{ $user->payment_code }}</td>
                                        <td> {{ $user->cur_type }}</td>
                                        <td> {{ $user->des_type }}</td>
                                        <td> {{ $user->payment_type }}</td>
                                        <td> {{ $user->payment_currency }}</td>
                                        <td> {{ $user->proof }}</td>
                                        <td>
                                            <a href="/user-profile/{{ $user->id }}" style="margin-left: -10px; padding-right: 10px">Upgrade</a>
                                            <a href="/cmm" style="color: red;">Deny</a>
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
    </div>
@endsection
@section("js")
@endsection
