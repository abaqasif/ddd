@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Add Recipe</h1>
        {!! Form::open(['route' => 'recipe.store']) !!}

        <div class="form-group">
            {!! Form::label('Brand', 'Select Brand:', ['class' => 'control-label']) !!}
            {!!  Form::select('brand', ['RELIANCE' => 'Reliance', 'OSAKA' => 'Osaka', 'TINTING COLOR PASTE' => 'Tiniting Color Paste',
             'OSAKA & CLASSIC' => 'Osaka & classic',  'SMART' => 'Smart' , 'SUPER KOTE' => 'Super Kote']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('Type', 'Select type:', ['class' => 'control-label']) !!}

            {!!  Form::select('type', ['ENAMEL' => 'Enamel','CLASSIC SYNTHETIC ENAMEL' => 'Classic Synthetic Enamel','SYNTHETIC ENAMEL' => 'Synthetic Enamel', 'SEMI PLASTIC' => 'Semi Plastic',
            'MATT ENAMEL' => 'Matt Enamel' , 'WEATHER SHELTER' => 'Weather Shelter' , 'GOLDEN TOWN' => 'Golden Town' , 'CASH SALE' => 'Cash Sale'
            , 'DISTEMPER' => 'Distemper', 'SEMI GLOSS' => 'Semi Gloss', 'FULL GLOSS' => 'Full GLoss', 'TOP LAC' => 'Top Lac', '2K' => '2k' ,
            'WALL COAT' => 'Wall Coat' , 'THINNER' => 'Thinner']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('Shade', 'Shade:', ['class' => 'control-label']) !!}
            {!! Form::text('shade', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('UOM', 'Select Unit:', ['class' => 'control-label']) !!}

            {!!  Form::select('UOM', ['Kg' => 'Kg', 'Litre' => 'ltr']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('type_id', 'Select Item Type:', ['class' => 'control-label']) !!}
            {!!  Form::text('type_id', null, ['class' => 'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('BatchSize', 'Batch Size:', ['class' => 'control-label']) !!}
            {!! Form::text('batchsize', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Next', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}



    </div>
@stop