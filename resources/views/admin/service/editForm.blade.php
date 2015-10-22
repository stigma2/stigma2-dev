<div class="row"> 
    <div class="small-7 columns">
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                        For Template
                        </label>
                    </div>
                    <div class="small-8 columns"> 
                        @if(isset($service))
                        {!! Form::select('is_template', array( 'N' => 'N','Y' =>'Y'),$service->is_template)  !!}
                        @else
                        {!! Form::select('is_template', array( 'N' => 'N','Y' =>'Y'))  !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            Immutable 
                        </label>
                    </div>
                    <div class="small-8 columns">
                        @if(isset($service))
                        {!! Form::select('is_immutable', array( 'N' => 'N','Y' =>'Y'),$service->is_immutable)  !!}
                        @else
                        {!! Form::select('is_immutable', array( 'N' => 'N','Y' =>'Y'))  !!}
                        @endif 
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            SERVICE NAME
                        </label>
                    </div>
                    <div class="small-8 columns">
                        @if(isset($service))
                        {!! Form::text('service_name', $service->service_name) !!} 
                        @else
                        {!! Form::text('service_name') !!} 
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if(isset($service))
        @include('admin.partials.check_command_field',array('commandList' => $commandList, 'model'=>$service)) 
        @else
        @include('admin.partials.check_command_field',array('commandList' => $commandList)) 
        @endif


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
                        @if(isset($serviceJsonData) && isset($serviceJsonData->{$key})) 
                        <?php 
                            $data = $serviceJsonData->{$key}  ;
                        ?>
                        @else
                        <?php 
                            $data = null ;
                        ?>
                        @endif

                        @if($formGroup['data_type'] == 'enum')
                        {!! Form::select($key,array_flip($formGroup['values']),$data) !!}
                        @else
                        {!! Form::text($key,$data) !!}
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="small-5 columns">
        <div class="panel white-panel  radius">
            <h5>Used Service Template</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50"></th>
                        <th>Service Template</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serviceTemplateCollection as $serviceItem)
                    <tr>
                        <?php
                            $check = false ;
                            $templateIds = [] ;

                            if(isset($service)) {
                                $templateIds = $service->template_ids ; 
                                $templateIds = explode(',',$templateIds) ;

                                foreach($templateIds as $templateId)
                                {
                                    if($serviceItem->getKey() == $templateId){
                                        $check = true ;
                                    }
                                }
                            } 
                        ?>
                        <td>{!! Form::checkbox('service_template[]', $serviceItem->getKey() ,$check) !!}</td>
                        <td>
                            {{$serviceItem->service_name}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div> 
    </div>
</div>
{!! Form::submit('SAVE' ,array('class'=>'right button')) !!}
