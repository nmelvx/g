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
                                {{ dd($job) }}
                            <tr>
                                <td>{{ $job->id }}</td>
                                <td>John Doe</td>
                                <td>11-7-2014</td>
                                <td><span class="label label-success">Approved</span></td>
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