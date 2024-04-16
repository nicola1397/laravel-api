<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectApi extends Controller
{
    public function index()
    {
        $projects = Project::select(['id', 'type_id', 'title', 'image_url', 'description'])->with(['technologies', 'type'])->paginate(10);

        foreach ($projects as $project) {
            $project->image = asset('/storage' . "/" . $project->image_url);
        }
        return response()->json(
            [
                'success' => true,
                'results' => $projects
            ]
        );
    }
}
