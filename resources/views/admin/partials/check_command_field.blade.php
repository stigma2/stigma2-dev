<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-4 columns">
                <label for="right-label" class="right inline">
                    CHECK_COMMAND 
                </label>
            </div>
            <div class="small-8 columns">
                <div class="row">
                    <div class="small-6 columns">
                        @if(isset($model))
                        {!! Form::select('command_id',array_merge(['0' => 'NONE' ]  , $commandList), $model->command_id)  !!}
                        @else
                        {!! Form::select('command_id', array_merge(['0' => 'NONE' ] , $commandList))  !!}
                        @endif
                    </div> 
                    <div class="small-6 columns"> 
                        @if(isset($model))
                        {!! Form::text('command_argument',$model->command_argument, array('placeholder' => 'argument'))  !!}
                        @else
                        {!! Form::text('command_argument','', array('placeholder' => 'argument'))  !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
