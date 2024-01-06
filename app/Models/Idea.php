<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Output\ConsoleOutput;

class Idea extends Model
{
    use HasFactory;
    protected $table = 'ideas';
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'bounty',
        'deadline',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function hasProposalFromUser($user_id)
    {
        return $this->proposals()->where('user_id', $user_id)->exists();
    }

    public function proposalFromUser($user_id)
    {
        return $this->proposals()->where('user_id', $user_id)->first();
    }

    public function hasAcceptedProposal()
    {
        return $this->hasOneThrough(AcceptedProposal::class, Proposal::class)->exists();
    }

    public function acceptedProposal()
    {
        return $this->hasOneThrough(AcceptedProposal::class, Proposal::class);
    }

}
