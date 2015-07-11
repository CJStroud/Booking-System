<?php

class ResultsController extends \BaseController {

    public function getResults()
    {
        $resultsDir = "./result/";

        // results is an array of series
        $results = [];

        if (file_exists($resultsDir)) {
            $seriesFolders = scandir($resultsDir);

            for ($i = 2; $i < count($seriesFolders); $i++) {
            // series is an object with a name and array of meetings
                $series = new stdClass();
                $series->name = $seriesFolders[$i];
                $meetingFolders = scandir($resultsDir . $series->name);

                $meetings = [];

                for ($j = 2; $j < count($meetingFolders); $j++) {
                // meeting is an object with a name and folder
                    $meeting = new stdClass();
                    $meeting->name = $meetingFolders[$j];

                    $path = "./result/" . $series->name . "/" . $meeting->name . "/index.htm";

                    if (!file_exists($path)) {
                        $path = "./result/" . $series->name . "/" . $meeting->name . "/series.htm";
                    }

                    $meeting->path = $path;
                    array_push($meetings, $meeting);


                    $dateFile = $resultsDir . $series->name . "/" . $meeting->name . "/date.txt";
                    $date = "";
                    if (file_exists($dateFile)) {
                        $date = " - " .file_get_contents($dateFile);
                    }

                    $meeting->folderName = $meeting->name;
                    $meeting->name = ucfirst(str_replace('-', ' ', $meeting->name)) . $date;
                }

                $series->folderName = $series->name;
                $series->name = ucfirst(str_replace('-', ' ', $series->name));
                $series->meetings = $meetings;
                array_push($results, $series);
            }
        }

        return $results;
    }


    public function home()
    {
        $results = $this->getResults();

        $success = Session::get('success') == null ?
            '' : Session::get('success');

        return View::make('results.home')
            ->withActive('results')
            ->withResults($results)
            ->withSuccess($success);
    }

    public function meetings($series)
    {
        $resultsDir = "./result/" . $series;

        $meetings = [];

        if (file_exists($resultsDir)) {
            $meetingFolders = scandir($resultsDir);

            for ($i = 2; $i < count($meetingFolders); $i++) {
                $meeting = new stdClass();
                $meeting->folderName = $resultsDir . "/" . $meetingFolders[$i];
                $meeting->name = ucfirst(str_replace('-', ' ', $meetingFolders[$i]));
                array_push($meetings, $meeting);
            }

            return View::make('results.series-meeting')
                ->withActive('results')
                ->withFolder($series)
                ->withSeries(ucfirst(str_replace('-', ' ', $series)))
                ->withMeetings($meetings);
        }

    }

    public function createSeries()
    {
        return View::make('results.create-series')
            ->withActive('results');
    }

    public function storeSeries()
    {
        $errors = [];

        $rules = array ('series-name' => 'required|min:3|regex:/^[a-zA-Z].+$/');

        $messages = array(
            ['series-name.regex' => 'The series name must start with a letter']);

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect::route('admin.create.series')
                ->withErrors($validator->messages());
        }

        $failed = false;
        $errors = [];

        $series = strtolower(str_replace(' ', '-', Input::get('series-name')));

        $directory = "./result/" . $series;
        if (!$failed && file_exists($directory)) {
            $failed = true;
            array_push($errors, "A series already exists with that name");
        }

        if (!$failed && !mkdir($directory, 0777, true)) {
            $failed = true;
            array_push($errors, "Unable to create the folder for series");
        }

        if ($failed) {
            return Redirect::route('admin.create.series')->withErrors($errors);
        }

        return Redirect::route('admin.results')
            ->withActive('results')
            ->withSuccess('Successfully create new series');
    }

    public function createMeeting($series)
    {
        $seriesObj = new stdClass();
        $seriesObj->name = ucfirst(str_replace('-', ' ', $series));
        $seriesObj->folderName = $series;

        $errors = Session::get('errors');

        return View::make('results.create-meeting')
            ->withSeries($seriesObj)
            ->withActive('results')
            ->withErrors($errors);
    }

    public function storeMeeting()
    {
        $errors = [];
        $series = Input::get('series-name');

        $rules = array ('meeting-name' => 'required|min:3|regex:/^[a-zA-Z].+$/',
                        'date' => 'required');

        $messages = array(
            ['meeting-name.regex' => 'The meeting name must start with a letter']);

        $validator = Validator::make(Input::all(), $rules, $messages);

        $meeting = strtolower(str_replace(' ', '-', Input::get('meeting-name')));

        $directory = "./result/" . $series  . "/" . $meeting . "/";

        if (file_exists($directory) && $meeting != '') {
            return Redirect::route('admin.series.meetings', $series)
                ->withErrors(['A meeting with that name already exists']);
        }



        if ($validator->fails()) {
            return Redirect::route('admin.series.meetings', $series)
                ->withErrors($validator->messages());
        }

        if (count($_FILES['upload']['name']) < 1) {
            return Redirect::route('admin.series.meetings', $series)
                ->withErrors(['You must upload some files']);
        }

        $hasIndex = false;
        for ($i=0; $i<count($_FILES['upload']['name']); $i++) {
            if ($_FILES['upload']['name'][$i] == "index.htm" || $_FILES['upload']['name'][$i] == "series.htm")
                $hasIndex = true;
        }

        if (!$hasIndex) {
            return Redirect::route('admin.series.meetings', $series)
                ->withErrors(['You must upload an "index.htm" or a "series.htm" file']);
        }

        mkdir($directory, 0777, true);

        for ($i=0; $i<count($_FILES['upload']['name']); $i++) {
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            if ($tmpFilePath != "") {
                $newFilePath = $directory . $_FILES['upload']['name'][$i];
                move_uploaded_file($tmpFilePath, $newFilePath);
            }
        }

        $dateFile =$directory . "date.txt";
        if (file_exists($dateFile)) {
            unlink($dateFile);
        }

        $fileHandle = fopen($dateFile, "w");
        $date = date("d/m/Y", strtotime(Input::get('date')));
        fwrite($fileHandle, $date);
        fclose($fileHandle);

        return Redirect::route('admin.results')
            ->withActive('results')
            ->withSuccess('Successfully created new meeting');
    }

    public function view()
    {
        $results = $this->getResults();
        return View::make('results.view')
            ->withResults($results);
    }

    public function deleteSeries()
    {
        $folder = Input::get('series-folder');
        $directory = './result/' . $folder;

        array_map('unlink', glob("$directory/*.*"));

        $folders = scandir($directory);

        foreach ($folders as $folder) {
            if ($folder != "." && $folder != "..") {
                array_map('unlink', glob("$directory/$folder/*.*"));
                rmdir($directory. "/" . $folder);
            }
        }

        if (!rmdir($directory)) {
            return Redirect::route('admin.results')
                ->withActive('results')
                ->withErrors(['There was an error while trying to remove the series']);
        }

        return Redirect::route('admin.results')
            ->withActive('results')
            ->withSuccess('Successfully deleted the series');
    }

    public function deleteMeeting()
    {
        $directory = Input::get('meeting-folder');

        array_map('unlink', glob("$directory/*.*"));

        if (!rmdir($directory)) {
            return Redirect::route('admin.results')
                ->withActive('results')
                ->withErrors(['There was an error while trying to remove the series']);
        }

        return Redirect::route('admin.results')
            ->withActive('results')
            ->withSuccess('Successfully deleted the meeting');
    }
}
