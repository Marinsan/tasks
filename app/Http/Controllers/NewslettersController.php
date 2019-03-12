<?php
namespace App\Http\Controllers;
use App\Http\Requests\NewsletterIndex;
use App\Http\Requests\Positions\PositionsIndex;
use Newsletter;
/**
 * Class NewslettersController.
 *
 * @package App\Http\Controllers\Web
 */
class NewslettersController extends Controller
{
    /**
     * Index.
     *
     * @param PositionsIndex $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(NewsletterIndex $request)
    {
        $newsletter = collect(Newsletter::getMembers());
        return view('newsletters.index', compact('newsletter'));
    }
}