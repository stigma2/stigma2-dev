<?php
namespace Stigma\Installation\Generators ;

use Stigma\Installation\Contracts\ConfigFileGenerator;
use Stigma\Installation\Generators\FileGenerator ;

class DatabaseFileGenerator extends FileGenerator implements ConfigFileGenerator
{
    protected $tmplPath  ;
    protected $outputPath ; 

    public function __construct(
        $tmplPath , 
        $outputPath )
    {
        $tmplPath = './../tmpl/database.php'; 
        $this->tmplPath = $tmplPath ;
        $this->outputPath = $outputPath ; 
    } 
}
