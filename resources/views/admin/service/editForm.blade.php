<div class="row"> 
    <div class="small-7 columns">
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            SERVICE NAME
                        </label>
                    </div>
                    <div class="small-8 columns">
                        {!! Form::text('service_name') !!} 
                    </div>
                </div>
            </div>
        </div>

        @foreach($serviceTmpl as $key => $formGroup) 
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            @if($formGroup['required'])<span>*</span>@endif
                            {{$formGroup['display_name']}}
                        </label>
                    </div>
                    <div class="small-8 columns">
                        @if($formGroup['data_type'] == 'enum')
                        {!! Form::select($key,array_flip($formGroup['values'])) !!}
                        @else
                        {!! Form::text($key) !!}
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="small-5 columns">
        <div class="panel callout radius">
            <h5>Used Service Template</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Template Name</th>
                    </tr>
                </thead>
            </table>
        </div> 
    </div>
</div>
{!! Form::submit('SAVE' ,array('class'=>'right button')) !!}
