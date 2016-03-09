<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Syllable.php";

    // $DB = new PDO('pgsql:host=localhost;dbname=to_do_test');


    class SyllableTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Syllable::deleteAll();
        }

        function test_getDescription()
        {
          // if (empty($_SESSION['list_of_tasks'])) {
          //     $_SESSION['list_of_tasks'];
          // }
            //Arrange
            $description = "Wash the dog";
            $test_task = new Task($description);
            //$test_task->save();

            //Act
            //$result = $test_task->getDescription();
            $result = $test_task->getDescription();
            //$compare = new Task($description);

            //Assert
            $this->assertEquals("Wash the dog", $test_task->getDescription());
        }


        function test_allDescription()
        {
          if (empty($_SESSION['list_of_tasks'])) {
              $_SESSION['list_of_tasks'];
          }
            //Arrange
            $description = "Wash the dog";
            $test_task = new Task($description);
            $test_task->save();


            //Act
            $result = Task::getAll();
            $getResult = $result[0]->getDescription();
            $firstResult = $test_task->getDescription();

            //Assert
            $this->assertEquals($firstResult, $getResult);
        }
    }
?>
