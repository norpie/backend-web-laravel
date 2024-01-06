<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptedProposal extends Model
{
    use HasFactory;
    protected $table = 'accepted_proposals';

    protected $fillable = [
        'proposal_id',
        'description',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function idea()
    {
        return $this->proposal()->idea();
    }
}
