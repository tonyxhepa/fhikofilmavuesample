<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter movie name']) !!}
</div>

<!-- Running Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('running_time', 'Running Time:') !!}
    {!! Form::text('running_time', null, ['class' => 'form-control', 'placeholder' => 'Enter movie running time']) !!}
</div>

<!-- Release Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('release_date', 'Release Date:') !!}
    {!! Form::date('release_date', null, ['class' => 'form-control', 'placeholder' => 'Enter movie release date']) !!}
</div>


<div class="clearfix"></div>
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('sezoni', 'Sezoni') !!}
    {!! Form::text('sezoni', null, ['class' => 'form-control', 'placeholder' => 'Enter movie description']) !!}
</div>


<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('serial_description', 'Serial Description') !!}
    {!! Form::textarea('serial_description', null, ['class' => 'form-control', 'placeholder' => 'Enter movie description']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('movies.index') !!}" class="btn btn-default">Cancel</a>
</div>