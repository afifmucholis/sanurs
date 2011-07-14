<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of testClass
 *
 * @author user
 */
class TestModel extends CI_Controller {

    function index() {
        $this->load->model('alumni', 'tes');
        $alumni = array(
            'id' => 1,
            'name' => 'Akbar Gumbira',
            'birthdate' => date("Y-m-d"),
            'last_unit_id' => 3,
            'graduate_year' => 2011,
            'is_registered' => 0,
        );
        /* Tes addAlumni :
          $get = $this->tes->addAlumni($alumni);
          if (is_bool($get)) {
          echo 'salah dudul';
          } else {
          echo 'insert berhasil. id : '.$get ;
          } */

        /* Tes updateAlumni :
         */
        /* $getReturn = $this->tes->updateAlumni($alumni);
          if (is_bool($getReturn)) {
          echo 'salah dudul';
          } else {
          echo 'update berhasil, jumlah row : '.$getReturn;
          }
         */

        //Tes getAlumnis
        /* $alum = array(
          'id !=' => 2,
          //'name' => 'Danang Dodol',
          //'birthdate' => date("Y-m-d"),
          //'last_unit_id' => 3,
          //'graduate_year' => 2011,
          //'is_registered' => 0,
          'sortBy' => 'is_registered',
          'sortDirection' => 'desc'
          );
          $getReturn = $this->tes->getAlumnis($alum);
          if (is_bool($getReturn)) {
          echo "no record";
          } else {
          for ($i=0; $i< count($getReturn); ++$i) {
          echo $getReturn[$i]->name."<br>";
          echo $getReturn[$i]->birthdate."<br>";
          echo $getReturn[$i]->last_unit_id."<br>";
          echo $getReturn[$i]->graduate_year."<br>";
          echo $getReturn[$i]->is_registered."<br>";
          echo "<hr>";
          }
          } */

        /* //Tes Delete
          $alum = array('id'=>4);
          $getReturn = $this->tes->deleteAlumni($alum);
          if (is_bool($getReturn)) {
          echo "delete gagal";
          echo md5("password");
          } else {
          echo "delete berhasil";
          echo md5("password");
          }
         */

        $this->load->model('event_model', 'eventModel');

        $today = time();
        $mysqldatetoday = date( 'Y-m-d H:i:s', $today);
        
        $optionUpcoming = array('start_time <' => $mysqldatetoday);
        
        $getReturn = $this->eventModel->getEvents($optionUpcoming);
        if (is_bool($getReturn)) {
            echo "no record";
        } else {
            for ($i = 0; $i < count($getReturn); ++$i) {
                echo $getReturn[$i]->id . "<br>";
                echo $getReturn[$i]->title . "<br>";
                echo $getReturn[$i]->description . "<br>";
                echo $getReturn[$i]->start_time . "<br>";
                echo $getReturn[$i]->venue . "<br>";
                echo "<hr>";
            }
        }
    }

}

?>
