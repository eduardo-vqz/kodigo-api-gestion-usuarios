<?php

namespace App\Http\Controllers;

use App\Models\User;

class StatsController extends Controller
{
    /**
     * Usuarios creados por día.
     */
    public function usersDaily()
    {
        $stats = User::selectRaw('DATE(created_at) as fecha, COUNT(*) as total')
            ->groupBy('fecha')
            ->orderBy('fecha', 'asc')
            ->get();

        return response()->json($stats);
    }

    /**
     * Usuarios creados por semana (YEARWEEK).
     */
    public function usersWeekly()
    {
        $stats = User::selectRaw('YEARWEEK(created_at, 1) as semana, COUNT(*) as total')
            ->groupBy('semana')
            ->orderBy('semana', 'asc')
            ->get();

        return response()->json($stats);
    }

    /**
     * Usuarios creados por mes (YYYY-MM).
     */
    public function usersMonthly()
    {
        $stats = User::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes', 'asc')
            ->get();

        return response()->json($stats);
    }
}
