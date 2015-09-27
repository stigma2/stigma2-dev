<?php
namespace Stigma\Installation;
use Stigma\Installation\AcceptanceTester;

class InstallationCest
{
    public function _before(AcceptanceTester $I)
    {
        foreach(['nagios','grafana','influxdb'] as $fileName) {
            if(file_exists(config_path()."/$fileName.php" )){ 
                $I->deleteFile(config_path().'/'.$fileName.'.php') ;
            }
        }
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function testToInstallWhenNotInstalled(AcceptanceTester $I)
    { 
        $I->wantTo('Try to Install If stigma was not installed') ;

        foreach(['nagios','grafana','influxdb'] as $fileName) {
            if(file_exists(config_path()."/$fileName.php" )){ 
                $I->deleteFile(config_path().'/'.$fileName.'.php') ;
            }
        }

        $I->amOnPage('/') ;
        $I->seeInCurrentUrl('/installation') ;
        $I->see('installation') ;
        $I->click('#next-btn') ; 

        $I->amOnPage('/install/database') ;
    }

    public function testToInstallDatabase(AcceptanceTester $I)
    { 
        $I->wantTo('Install database') ; 
        
        $I->amOnPage('/install/database') ; 
        $I->fillField('host','localhost') ;
        $I->fillField('database','stigma') ;
        $I->fillField('dbuser','homestead') ;
        $I->fillField('password','secret') ;
        $I->click('#next-btn') ;

        $I->amOnPage('/install/nagios') ;

        $I->seeFileFound('database.php', config_path()) ;
    }
    

    public function testToInstallDatabaseWhenParametersAreInvalid(AcceptanceTester $I)
    { 
        $I->wantTo('Fail to Install database') ; 
        
        $I->amOnPage('/install/database') ; 
        $I->fillField('host','localhost') ;
        $I->fillField('dbuser','homestead') ;
        $I->fillField('password','secret') ;
        $I->click('#next-btn') ; 
        $I->see('Install Database') ; 
    }

    public function testToInstallDatabaseWhenDatabaseConnectionIsOff(AcceptanceTester $I)
    { 
        $I->wantTo('Fail to Install database') ; 
        
        $I->amOnPage('/install/database') ; 
        $I->fillField('host','localhost') ;
        $I->fillField('database','not_exists_database') ;
        $I->fillField('dbuser','homestead') ;
        $I->fillField('password','secret') ;
        $I->click('#next-btn') ; 
        $I->see('Install Database') ; 
    }


    public function testToInstall(AcceptanceTester $I)
    { 
        $I->wantTo('see status whene installation is succesful') ;

        foreach(['nagios','grafana','influxdb'] as $fileName) {
            if(!file_exists(config_path()."/$fileName.php" )){ 
                file_put_contents((config_path().'/'.$fileName.'.php'),'') ;
            }
        } 

        $I->amOnPage('/') ;
        $I->see('installed') ;
    }
}
