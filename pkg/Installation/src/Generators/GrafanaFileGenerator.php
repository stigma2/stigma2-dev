<?php
namespace Stigma\Installation\Generators ;

use Stigma\Installation\Contracts\ConfigFileGenerator;
use Stigma\Installation\Generators\FileGenerator ;

class GrafanaFileGenerator extends FileGenerator implements ConfigFileGenerator
{
    protected $tmplPath  ;
    protected $outputPath ; 

    public function __construct(
        $tmplPath = __DIR__.'/../tmpl/grafana.php', 
        $outputPath )
    {
        $this->tmplPath = $tmplPath ;
        $this->outputPath = $outputPath ; 
    }

}
