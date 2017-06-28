    @extends('admin.layouts.default')
    @section('content')
    <section class="content-header">
        <h1>
            JOBS
            <small>list</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Jobs</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Observations</th>
                            </tr>
                            @foreach($jobs as $k => $job)
                            <tr>

                                <td>{{ $job->id }}</td>
                                <td>{{ $job->user->firstname.' '.$job->user->lastname }}</td>
                                <td>{{ $job->date }}</td>
                                @if($job->status == 1)
                                <td><span class="label label-success">Approved</span></td>
                                @elseif($job->status == 0)
                                <td><span class="label label-warning">Pending</span></td>
                                @endif
                                <td>{{ $job->observations or '-' }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    @stop