<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $table = 'proposals';

    protected $fillable = [
        'user_id',
        'idea_id',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    public function isAccepted()
    {
        return $this->acceptedProposal()->exists();
    }

    public function acceptedProposal()
    {
        return $this->hasOne(AcceptedProposal::class);
    }
}
