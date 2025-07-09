<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public static function dashboard()
    {
        global $db;
        // Events per maand
        $sql1 = "SELECT DATE_FORMAT(start_date, '%Y-%m') as maand, COUNT(*) as aantal FROM events GROUP BY maand ORDER BY maand";
        $stmt1 = $db->prepare($sql1);
        $stmt1->execute();
        $rows1 = $stmt1->fetchAll();
        $labelsEvents = array_column($rows1, 'maand');
        $dataEvents = array_column($rows1, 'aantal');

        // Tickets per event
        $sql2 = "SELECT e.name as event, COUNT(t.id) as aantal FROM events e LEFT JOIN tickets t ON t.event_id = e.id GROUP BY e.id ORDER BY aantal DESC";
        $stmt2 = $db->prepare($sql2);
        $stmt2->execute();
        $rows2 = $stmt2->fetchAll();
        $labelsTickets = array_column($rows2, 'event');
        $dataTickets = array_column($rows2, 'aantal');

        self::loadView('dashboard', [
            'title' => 'Dashboard',
            'labelsEvents' => $labelsEvents,
            'dataEvents' => $dataEvents,
            'labelsTickets' => $labelsTickets,
            'dataTickets' => $dataTickets
        ]);
    }

    public static function index()
    {
        self::loadView('/home', [
            'title' => 'Homepage'
        ]);
    }
}
