<?php

namespace App\PDF;

use App\Models\Attendance;
use App\Models\Classroom;
use Mpdf\Mpdf;

class AttendancePDF
{
    protected $mpdf;
    protected $attendances;
    protected $date;
    protected $classroom;

    public function __construct($attendances, $date, $classroom = null)
    {
        $this->attendances = $attendances;
        $this->date = $date;
        $this->classroom = $classroom;

        $this->mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'L',
        ]);
    }

    public function generate()
    {
        $this->mpdf->WriteHTML($this->header());
        $this->mpdf->WriteHTML($this->content());
        $this->mpdf->WriteHTML($this->footer());

        return $this->mpdf;
    }

    protected function header()
    {
        $schoolName = config('app.school_name', 'SMK Example');
        $title = $this->classroom
            ? "Laporan Kehadiran Kelas {$this->classroom->name} Tanggal {$this->date}"
            : "Laporan Kehadiran Seluruh Kelas Tanggal {$this->date}";

        return view('attendance.pdf.header', compact('schoolName', 'title'))->render();
    }

    protected function content()
    {
        return view('attendance.pdf.content', [
            'attendances' => $this->attendances,
            'date' => $this->date,
            'classroom' => $this->classroom,
        ])->render();
    }

    protected function footer()
    {
        return view('attendance.pdf.footer')->render();
    }

    public function download($filename)
    {
        $this->generate();
        return $this->mpdf->Output($filename, 'D');
    }
}
