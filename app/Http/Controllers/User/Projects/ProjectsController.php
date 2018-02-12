<?php

namespace App\Http\Controllers\User\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Helper;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\Project\Project, App\Models\Project\ProjectImage;

use App\Http\Requests\ProjectImageUploadRequest;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_budgets = Project::$project_budgets;
        $categories = Helper::getAllCategories($list = true);
        return view('user.projects.create', compact('categories', 'project_budgets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectImageUploadRequest $request)
    {
        
        $message = '';
        DB::beginTransaction();
        /* Insert data to projects table */
        try {
            // Validate, then create if valid
            $data = $request->except('files', '_token');
            $slug = Helper::getUniqueSlug(new Project(), $request->name);
            $data['slug']       = $slug;
            $data['user_id']    = Auth::id();

            $validator = Validator::make($data, Project::$rules);
            
            if ($validator->fails()) return  Redirect::back()->withErrors($validator)->withInput();

            $project = Project::create( $data );
        }catch(ValidationException $e)
        {
            return Redirect::back();
        }
        try {
            //loop through the items entered

            $files = $request->file('files');

            if(!empty($files)):
                foreach ($files as $photo) {
                    $image_data = [];
                    $filename = $photo->store(config('globals.project_file_store_path'));

                    $image_data['project_id'] = $project->id;
                    $image_data['image_path'] = $filename;

                    ProjectImage::create($image_data);
                }
            endif;
            // Validate, then create if valid
        } catch(ValidationException $e)
        {
            // Back to form
            return Redirect::back();
        }
        // Commit the queries!
        DB::commit();

        $category = DB::table('categories')->where('id', $request->category_id)->first()->slug;
        return Redirect::route('project.view', [$category, $slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_name, $slug)
    {
        $project_data = Helper::projectSlugGhost($slug);
        if($project_data) {
            $project_images = ProjectImage::where('project_id', $project_data->id)->get();  
            return view('user.projects.view', compact('project_data', 'project_images'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
