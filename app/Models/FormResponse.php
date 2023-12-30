<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormResponse extends Model
{
    use HasFactory;
    protected $table = 'contact_form_answers';
    protected $fillable = [
        'contact_form_id',
        'admin_id',
        'answer',
    ];

    public function contactForm()
    {
        return $this->belongsTo(ContactForm::class);
    }
}
