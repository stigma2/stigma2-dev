<div class="row">
    <div class="small-7 columns">
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                        Only Template
                        </label>
                    </div>
                    <div class="small-8 columns">
                        {!! Form::select('is_template', array( 'N' => 'N','Y' =>'Y'))  !!}
                    </div>
                </div>
            </div>
        </div>

        @foreach($hostTmpl as $key => $formGroup) 
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
                        @if(isset($hostJsonData) && isset($hostJsonData->{$key})) 
                        <?php 
                            $data = $hostJsonData->{$key}  ;
                        ?>
                        @else
                        <?php 
                            $data = null ;
                        ?>
                        @endif
                        @if($formGroup['data_type'] == 'enum')
                        {!! Form::select($key,array_flip($formGroup['values']),$data) !!}
                        @else
                        {!! Form::text($key,$data ) !!}
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="small-5 columns">
        <div class="panel callout radius">
            <h5>Used Host Template</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50"></th>
                        <th>Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hostTemplateCollection as $hostItem)
                    <tr>
                        <?php
                            $check = false ;
                            $templateIds = [] ;

                            if(isset($host)) {
                                $templateIds = $host->template_ids ; 
                                $templateIds = explode(',',$templateIds) ;
                            } 

                            foreach($templateIds as $templateId)
                            {
                                if($hostItem->getKey() == $templateId){
                                    $check = true ;
                                }
                            }
                        ?>
                        <td>{!! Form::checkbox('host_template[]', $hostItem->getKey() ,$check) !!}</td>
                        <td>
                            {{$hostItem->host_name}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr/> 
        <div class="panel callout radius">
            <h5>Service</h5>
            <p>It's a little ostentatious, but useful for important content.</p>
        </div>
    </div>
</div>
{!! Form::submit('SAVE' ,array('class'=>'right button')) !!}

