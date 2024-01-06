<?php

namespace App\Http\Controllers;

use App\Models\AcceptedProposal;
use App\Models\Idea;
use App\Models\Proposal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IdeaController extends Controller
{
    public function showIdea(Request $request, string $id): View
    {
        $idea = Idea::find($id);
        if (!$idea) {
            abort(404);
        }
        $idea->user = $idea->user()->first();
        return view('ideas.single', [
            'idea' => $idea
        ]);
    }

    public function showIdeas(Request $request): View
    {
        // Check if it has a query string id and if it is a number, if so, return the single idea view
        if ($request->has('id') && is_numeric($request->input('id'))) {
            return $this->showIdea($request, $request->input('id'));
        }

        // Return the list of ideas
        $ideas = Idea::all();

        // Add the user to the idea
        foreach ($ideas as $idea) {
            $idea->user = $idea->user()->first();
        }

        return view('ideas.list', [
            'ideas' => $ideas
        ]);
    }

    public function showCreateIdea(Request $request): View
    {
        return view('ideas.create');
    }

    public function addIdea(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'bounty' => 'required|numeric',
            'deadline' => 'required|date',
        ]);

        Idea::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'bounty' => $validated['bounty'],
            'deadline' => $validated['deadline'],
            'user_id' => $request->user()->id
        ]);

        return redirect()->route('ideas.list');
    }

    public function storeProposal(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'idea_id' => 'required|numeric',
            'description' => 'required',
        ]);

        $idea = Idea::find($request->input('idea_id'));

        if (!$idea) {
            abort(404);
        }

        $idea->proposals()->create([
            'user_id' => $request->user()->id,
            'description' => $validated['description'],
        ]);

        return redirect()->route('ideas.list', ['id' => $idea->id]);
    }

    public function acceptProposal(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'proposal_id' => 'required|numeric',
        ]);

        $proposal = Proposal::find($validated['proposal_id']);

        if (!$proposal) {
            abort(404);
        }

        $acceptedProposal = AcceptedProposal::create([
            'proposal_id' => $proposal->id,
        ]);

        return redirect()->route('ideas.list', ['id' => $proposal->idea->id]);
    }
}
