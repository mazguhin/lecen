@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Редактирование</h1>

    {!! Form::model($subject, [
        'method' => 'PATCH',
        'url' => ['/subjects', $subject->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Название', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('hours') ? 'has-error' : ''}}">
                {!! Form::label('hours', 'Часы', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('hours', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('hours', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cost') ? 'has-error' : ''}}">
                {!! Form::label('cost', 'Стоимость', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('cost', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
               <label for="course_id" class="col-sm-3 control-label">Курс</label>
                <div class="col-sm-6">
                    <select id="course_id" name="course_id" class="form-control" required>
                        @foreach ($courses as $course)
                            <option 
                            @if ($course->id==$course_id_now)
                                selected
                            @endif
                            value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Применить', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection