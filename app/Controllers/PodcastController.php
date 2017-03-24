<?php

namespace App\Controllers;

use App\Models\Podcast;
use App\Transformers\PodcastTransformer;

use League\Fractal\{
    Resource\Item,
    Resource\Collection,
    Pagination\IlluminatePaginatorAdapter
};
use Slim\Http\Request;
use Slim\Http\Response;

class PodcastController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $podcasts = Podcast::latest()->paginate(2);

        $transformer = (new Collection($podcasts->getCollection(), new PodcastTransformer))
            ->setPaginator(new IlluminatePaginatorAdapter($podcasts));

        return $response->withJson($this->c->fractal->createData($transformer)->toArray());
    }

    public function show(Request $request, Response $response, $args)
    {
        $podcast = Podcast::find($args['id']);

        if ($podcast === null) {
            return $response->withStatus(404);
        }

        $transformer = new Item($podcast, new PodcastTransformer);

        return $response->withJson($this->c->fractal->createData($transformer)->toArray());
    }
}
