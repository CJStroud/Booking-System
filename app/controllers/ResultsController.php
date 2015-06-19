<?php

class ResultsController extends \BaseController {

  public function createSeries()
  {
    $name = Input::get('name');

    // check for blank
    $directory = "./public/results/" . $name ;

    if (file_exists($directory))
    {
      return "A series with the name already exists";
    }

    mkdir($directory, 0700, true);
    // create directory or return error

  }

  public function createMeeting()
  {
    return View::make('results.create-meeting');
  }

  public function storeMeeting()
  {
    $meeting = strtolower(str_replace(' ', '-', Input::get('meeting-name')));

    $directory = "./public/results/" . Input::get('series-name') . "/" . $meeting . "/";

    if (!file_exists($directory))
    {
      mkdir($directory, 0700, true);
    }

    $dateFile =$directory . "date.txt";
    if (file_exists($dateFile))
    {
        unlink($dateFile);
    }

    $fileHandle = fopen($dateFile, "w");    
    $date = date("d/m/Y", strtotime(Input::get('date')));
    fwrite($fileHandle, $date);
    fclose($fileHandle);

    for($i=0; $i<count($_FILES['upload']['name']); $i++) {

      $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

      if ($tmpFilePath != ""){

        $newFilePath = $directory . $_FILES['upload']['name'][$i];

        if(move_uploaded_file($tmpFilePath, $newFilePath)) {

        }
      }
    }



  }

  public function view()
  {
    $resultsDir = "./public/results/";

    // results is an array of series
    $results = [];

    if (file_exists($resultsDir))
    {
      $seriesFolders = scandir($resultsDir);

      for ($i = 2; $i < count($seriesFolders); $i++)
      {
        // series is an object with a name and array of meetings
        $series = new stdClass();
        $series->name = $seriesFolders[$i];
        $meetingFolders = scandir($resultsDir . $series->name);

        $meetings = [];

        for ($j = 2; $j < count($meetingFolders); $j++)
        {
          // meeting is an object with a name and url
          $meeting = new stdClass();
          $meeting->name = $meetingFolders[$j];
          $meeting->url =
            "results/" . $series->name . "/" . $meeting->name . "/index.htm";
          array_push($meetings, $meeting);


          $dateFile = $resultsDir . $series->name . "/" . $meeting->name . "/date.txt";
          $date = "";
          if (file_exists($dateFile))
          {
            $date = " - " .file_get_contents($dateFile);
          }

          $meeting->name = ucfirst(str_replace('-', ' ', $meeting->name)) . $date;
        }

        $series->name = ucfirst(str_replace('-', ' ', $series->name));
        $series->meetings = $meetings;
        array_push($results, $series);
      }
    }

    return View::make('results.view')->withResults($results);

  }

}
