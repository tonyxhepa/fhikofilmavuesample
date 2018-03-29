<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter movie name']) !!}
</div>

<!-- Language Id Field -->


<div class="form-group col-sm-6">
    {!! Form::label('genres', 'Language :') !!}
    {!! Form::select('genres[]', $genres, null, ['placeholder' => 'Please select genres', 'class' => 'form-control', 'multiple' => true]) !!}
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

<!-- Movie Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('movie_actor', 'Movie Actor:') !!}
    {!! Form::textarea('movie_actor', null, ['class' => 'form-control', 'placeholder' => 'Enter movie Actor']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('movie_description', 'Movie Description') !!}
    {!! Form::textarea('movie_description', null, ['class' => 'form-control', 'placeholder' => 'Enter movie description']) !!}
</div>

<!-- Movie review Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('movie_review', 'Movie Review:') !!}
    {!! Form::textarea('movie_review', null, ['class' => 'form-control', 'placeholder' => 'Enter movie review']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('movies.index') !!}" class="btn btn-default">Cancel</a>
</div>