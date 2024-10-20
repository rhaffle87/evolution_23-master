<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PdfMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $pdf_files;

    public function __construct($pdf_files)
    {
        $this->pdf_files = $pdf_files;
    }

    public function build()
    {
        $message = $this->view('email.baronas-kartu-peserta');
        foreach ($this->pdf_files as $key => $pdf_file) {
            $filename = "filename_{$key}.pdf";
            $message->attachData($pdf_file, $filename, [
                'mime' => 'application/pdf',
            ]);
        }
        return $message;
    }
}
