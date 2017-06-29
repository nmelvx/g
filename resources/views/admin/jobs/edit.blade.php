    @extends('admin.layouts.default')
    @section('content')
    <section class="content-header">
        <h1>
            JOB
            <small>edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/jobs"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit job</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(array('route' => ['job.update', $job->id, ], 'method' => 'PUT', 'class' => 'edit-form form-horizontal', 'enctype' => 'multipart/form-data')) !!}
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input-title" class="col-sm-2 control-label">Job title</label>

                                <div class="col-sm-10">
                                    <input type="text" value="{{ $job->title or '' }}" class="form-control" name="title" id="input-title" placeholder="Job title">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-title" class="col-sm-2 control-label">Date</label>
                                <div class="col-sm-10">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" value="{{ $job->date or '' }}" name="date" class="form-control pull-right" id="datepicker">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-title" class="col-sm-2 control-label">Gallery</label>
                                <div class="col-sm-10">
                                    @foreach($job->images as $k => $image)
                                        <img src="{!! Helper::getImage('150x150', $image->path, 'images') !!}" data-img="{!! Helper::getImage('640x320', $image->path, 'images') !!}" data-elementid="{!! $image->id !!}" alt="{!! $image->desciption !!}" title="{!! $image->alt !!}">&nbsp;
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-title" class="col-sm-2 control-label">Pictures from job</label>
                                <div class="col-sm-10">
                                    <input type="file" name="images[]" multiple id="input-file">
                                    <p class="help-block">Please select a minimum of 4 images (jpeg type)</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <label>
                                        <input type="checkbox" class="flat-red" name="status" value="1" {{ ($job->status == 1)? 'checked':'' }}>
                                        Is job finalized?
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="/admin/jobs" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right">Save</button>
                        </div>
                        <!-- /.box-footer -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
    @stop