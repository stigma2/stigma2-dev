<?php
namespace Stigma\Installation\Generators ;

use Stigma\Installation\Contracts\ConfigFileGenerator;
use Mustache_Engine;

class DatabaseFileGenerator implements ConfigFileGenerator
{
    protected $tmplPath  ;
    protected $outputPath ; 

    public function __construct(
        $tmplPath = __DIR__.'/../tmpl/database.php', 
        $outputPath )
    {
        $this->tmplPath = $tmplPath ;
        $this->outputPath = $outputPath ; 
    }

    public function make(array $data)
    {
        $m = new Mustache_Engine; 

        $databaseTmpl = file_get_contents($this->tmplPath);
        $dbContent = $m->render($databaseTmpl, $data) ;
        $ret = file_put_contents($this->outputPath, $dbContent);

        return true ;
    }
}
