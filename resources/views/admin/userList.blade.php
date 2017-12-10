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
                        <ul class="pagination" style="float: right; padding-right: 30px">
                            @if ($indexPaging > 1)
                            <li><a href="?indexPaging={{$indexPaging - 1}}&page=1"><<</a></li>
                            @endif

                            @for ($i = $indexPaging; $i <= $indexPaging * 10 && $i <= $totalPage; $i++)
                                <li><a href="?indexPaging={{$indexPaging}}&page={{ $i }}">{{ $i }}</a></li>
                            @endfor

                            @if ($indexPaging < $totalPage / 10)
                            <li><a href="?indexPaging={{$indexPaging + 1}}&page=1">>></a></li>
                            @endif
                        </ul>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Payment Code</th>
                                <th>Option</th>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td> {{ $user->id }}</td>
                                        <td> {{ $user->email }}</td>
                                        <td> {{ $user->type }}</td>
                                        <td> {{ $user->payment_code }}</td>
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
