<?php

session_start();

require_once('./language.php');
require_once('./lib/sessions_init.php');
require_once('./lib/check_strings.php');
require_once('../models/dbconnect.php');
require_once('../models/list_pagination_functions.php');


if($_GET) {
  $query              = isset($_GET['query']) ? $_GET['query'] : '';
  $languages          = isset($_GET['languages']) ? $_GET['languages'] : '';
  $picked_eventyear   = isset($_GET['eventyear']) ? $_GET['eventyear'] : '';
  $picked_ideayear    = isset($_GET['ideayear']) ? $_GET['ideayear'] : '';

  $picked_eventmonth   = isset($_GET['eventmonth']) ? $_GET['eventmonth'] : '';
  $picked_ideamonth    = isset($_GET['ideamonth']) ? $_GET['ideamonth'] : '';

  $eventpage          = isset($_GET['eventpage']) ? $_GET['eventpage'] : '';
  $ideapage           = isset($_GET['ideapage']) ? $_GET['ideapage'] : '';
  $membername         = isset($_GET['membername']) ? $_GET['membername'] : '';
  $pagination_events  = isset($_GET['pagination_event']) ? $_GET['pagination_event'] : '';
  $pagination_ideas   = isset($_GET['pagination_idea']) ? $_GET['pagination_idea'] : '';

  //Set array $languages without comma
  if(!empty($languages)) {
  	$languages = explode(',', $languages);
  } else {
  	$languages = "";
  }

  if(!empty($picked_eventyear) OR (!empty($picked_eventmonth)) OR (!empty($pagination_events))) {
    $nb_events = count_events_by_type($DB, $query, $languages, $picked_eventyear, $picked_eventmonth);

    $nb_rows_per_page = 15;
    // Nombre de pages à afficher
    $events_total_pages = ceil($nb_events / $nb_rows_per_page);

    if (!empty($eventpage) && (is_numeric($eventpage))) {
      $events_current_page = $eventpage;
    } else {
      $events_current_page = 1;
    }

    // if event current page is greater than total pages...
    if ($events_current_page > $events_total_pages) {
      // set current page to last page
      $events_current_page = $events_total_pages;
    } // end if
    // if current page is less than first page...
    if ($events_current_page < 1) {
      // set current page to first page
      $events_current_page = 1;
    } // end if

    // the offset of the list, based on current page
    $events_offset = ($events_current_page - 1) * $nb_rows_per_page;

    //Send response to Ajax
    //If pagination, Ajax has requested nb_pages and current pages only.
    //Else, Ajax needs the events list.
    if ($pagination_events == 'true' ) {
      $PaginateResponse = array('current_page' => $events_current_page, 'total_pages' => $events_total_pages);
      echo json_encode($PaginateResponse);
    } else {
      $events = list_events_by_type($DB, $events_offset, $nb_rows_per_page, $query, $languages, $picked_eventyear, $picked_eventmonth);
      echo json_encode($events);
    }

  } else if (!empty($picked_ideayear) OR (!empty($picked_ideamonth)) OR (!empty($pagination_ideas)) OR (!empty($membername))) {
      $nb_ideas = count_ideas_by_type($DB, $query, $languages, $picked_ideayear, $picked_ideamonth, $membername);

      $nb_rows_per_page = 15;
      // Nombre de pages à afficher
      $ideas_total_pages = ceil($nb_ideas / $nb_rows_per_page);

      if (!empty($ideapage) && (is_numeric($ideapage))) {
        $ideas_current_page = $ideapage;
      } else {
        $ideas_current_page = 1;
      }

      // if idea current page is greater than total pages...
      if ($ideas_current_page > $ideas_total_pages) {
        // set current page to last page
        $ideas_current_page = $ideas_total_pages;
      } // end if
      // if current page is less than first page...
      if ($ideas_current_page < 1) {
        // set current page to first page
        $ideas_current_page = 1;
      } // end if

      // the offset of the list, based on current page
      $ideas_offset = ($ideas_current_page - 1) * $nb_rows_per_page;

      //Send response to Ajax
      if ($pagination_ideas == 'true' ) {
        $PaginateResponse = array('current_page' => $ideas_current_page, 'total_pages' => $ideas_total_pages);
        echo json_encode($PaginateResponse);
      } else {
        $ideas = list_ideas_by_type($DB, $ideas_offset, $nb_rows_per_page, $query, $languages, $picked_ideayear, $picked_eventmonth, $membername);
        echo json_encode($ideas);
      }
  }
}

?>
