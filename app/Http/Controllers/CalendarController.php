<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::now();
        $calendarWeek = [];

        $year = $today->year;
        $month = $today->month;
        // note: 月末日を取得
        $lastDay = $today->endOfMonth()->day;

        $calendarWeek = array();
        $theWhatWeeks = 0;
        $events = Event::where('date', '>=', Carbon::create($year, $month, 1))->Where('date', '<=', Carbon::create($year, $month, $lastDay))->get();

        // note: 月末日までループ
        for ($i = 1; $i < $lastDay + 1; $i++) {
            // note : 曜日を取得
            $date = Carbon::create($year, $month, $i);
            $week = $date->format('w');
            $eventWeek[$theWhatWeeks][$i] = $events->where('date', '=', Carbon::create($year, $month, $i))->all();

            // note : 1日の場合
            if ($i == 1) {
             // note : 1日目の曜日までをループ
                for ($s = 1; $s <= $week; $s++) {
                    // note : 後半にNULLをセット
                    $calendarWeek[$theWhatWeeks][] = null;
                }
            }
            // note :配列に日付をセット
            $calendarWeek[$theWhatWeeks][] = $i;
            // note : 6=土曜日
            if ($week == 6){
                $theWhatWeeks++;
            }
            // note :月末日の場合
            if ($i == $lastDay) {
                // note : 月末日から残りをループ
                for ($e = 1; $e <= 6 - $week; $e++) {
                    // note : 後半にNULLをセット
                    $calendarWeek[$theWhatWeeks][] = null;
                }
            }
        }

        return view('calendar')->with(['calendarWeek' => $calendarWeek,'eventWeek' => $eventWeek ]);
    }

    public function schedule(Request $request)
    {
        return view('calendar.schedule');
    }
    public function scheduleAdd(Request $request)
    {
        $validated = $request->validate([
            'event_date' => 'required|date',
            'event_name' => 'required|max:100',
        ]);

        Event::create([
            'name' => $request->event_name,
            'date' => $request->event_date,
        ]);

        $request->session()->flash('status', '登録処理が完了しました。');
        return redirect(route('calendar.index'));
    }
}
