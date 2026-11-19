<?php
require_once __DIR__ . "/../config/bootstrap.php";
//echo session_id();
//exponer el session id y los datos de $_SESSION permite que un atacante haga session hijacking
try {
    render('home', [
        'title' => 'Inicio',
        'alias' => $alias,
        'paginasVisitadas' => $paginasVisitadas,
        'ultimaSeccionVisitada' => $ultimaSeccionVisitada,
        'ultimaActividad' => $ultimaActividad
    ]);
} catch (Exception $e) {

}