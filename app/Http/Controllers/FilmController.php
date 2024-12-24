<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{

    public function film_theo_nam($id,Request $request){
        if ($request->has('page')) {
            $page = $request->get('page');
        } else {
            $page = 1;
        }
        $slug = $id;
        $url = "https://phim.nguonc.com/api/films/nam-phat-hanh/${slug}?page=${page}";
        try {
            $response = Http::get($url);

            if ($response->successful()) {
                return $response->json();
            }
            return [
                'error' => true,
                'message' => 'Failed to fetch films',
                'status' => $response->status(),
            ];
        } catch (\Exception $e) {
            // Handle exceptions
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
     /**
     * Display a listing of the resource.
     */
    public function film_theo_quoc_gia(Request $request,$id){
        if ($request->has('page')) {
            $page = $request->get('page');
        } else {
            $page = 1;
        }
        $slug = $id;
        $url = "https://phim.nguonc.com/api/films/quoc-gia/${slug}?page=${page}";
        try {
            $response = Http::get($url);

            if ($response->successful()) {
                return $response->json();
            }
            return [
                'error' => true,
                'message' => 'Failed to fetch films',
                'status' => $response->status(),
            ];
        } catch (\Exception $e) {
            // Handle exceptions
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function film_the_loai(Request $request,$id){
        if ($request->has('page')) {
            $page = $request->get('page');
        } else {
            $page = 1;
        }
        $slug = $id;
        $url = "https://phim.nguonc.com/api/films/the-loai/${slug}?page=${page}";
        try {
            $response = Http::get($url);

            if ($response->successful()) {
                return $response->json();
            }
            return [
                'error' => true,
                'message' => 'Failed to fetch films',
                'status' => $response->status(),
            ];
        } catch (\Exception $e) {
            // Handle exceptions
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
      /**
     * Display a listing of the resource.
     */
    public function film($id){
        $slug = $id;
        $url = "https://phim.nguonc.com/api/film/${slug}";
        try {
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();

            if ($data['status'] === 'success' && isset($data['movie'])) {
                $movie = $data['movie'];

                // Store or update the film in the database
                Film::updateOrCreate(
                    ['slug' => $movie['slug']], // Match existing film by slug
                    [
                        'title'       => $movie['name'],
                        'slug'        => $movie['slug'],
                        'description' => $movie['description'],
                        'link'        => $movie['episodes'][0]['items'][0]['embed'] ?? null, // Use embed value as the link
                        'created_at'  => $movie['created'],
                        'updated_at'  => $movie['modified'],
                    ]
                );
            }

            return $data;
            }
            return [
                'error' => true,
                'message' => 'Failed to fetch films',
                'status' => $response->status(),
            ];
        } catch (\Exception $e) {
            // Handle exceptions
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
  /**
     * Display a listing of the resource.
     */
    public function film_theo_danh_muc(Request $request,$id){
        if ($request->has('page')) {
            $page = $request->get('page');
        } else {
            $page = 1;
        }
        $slug = $id;
        $url = "https://phim.nguonc.com/api/films/danh-sach/${slug}?page=${page}";

        try {
            $response = Http::get($url);

            if ($response->successful()) {
                return $response->json();
            }
            return [
                'error' => true,
                'message' => 'Failed to fetch films',
                'status' => $response->status(),
            ];
        } catch (\Exception $e) {
            // Handle exceptions
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function film_moi(Request $request)
    {
        if ($request->has('page')) {
            $page = $request->get('page');
        } else {
            $page = 1;
        }
        $url = "https://phim.nguonc.com/api/films/phim-moi-cap-nhat?page={$page}";

        try {
            $response = Http::get($url);

            if ($response->successful()) {
                return $response->json();
            }
            return [
                'error' => true,
                'message' => 'Failed to fetch films',
                'status' => $response->status(),
            ];
        } catch (\Exception $e) {
            // Handle exceptions
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        //
    }
}
