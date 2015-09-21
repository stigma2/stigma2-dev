<?php
namespace Stigma\Installation;
use Stigma\Installation\Exceptions\InvalidParameterException ;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
*/
class UnitTester extends \Codeception\Actor
{
    use _generated\UnitTesterActions;

   /**
    * Define custom actions here
    */

    /*
    public function expectedException($exception ,$fn)
    {
        try {
            $fn() ;
        } catch(\Exception $e) { 
            if(get_class($e) == $exception or get_parent_class($e) == $exception){
                $this->assertTrue(true);
            }else{
                $this->assertTrue(false,"Expected exception is ".get_class($exception)); 
            }
        }
    }*/

    public function expectedInvalidParameterException($exception ,$fn)
    {
        try {
            $fn() ;
            $this->fail("Expected exception is ".get_class($exception)); 
        } catch(InvalidParameterException $e) { 
            if(get_class($e) == get_class($exception)){
                $this->assertTrue(true);
            }else{
                $this->fail("Expected exception is ".get_class($exception)); 
            }
        }
    }

    public function expectedPdoException($fn)
    {
        try {
            $fn() ;
            $this->fail("Expected exception is PDOException "); 
        } catch(\PDOException $e) { 
            $this->assertTrue(true);
        } catch (\Exception $e){
            $this->fail("Expected exception is PDOException "); 
        }
    }


}
