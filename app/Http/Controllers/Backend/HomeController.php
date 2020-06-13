<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use App\Post;
use App\Category;

use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;
use App\Libraries\GoogleAnalytics;

use Illuminate\Support\Facades\Auth;

class HomeController extends BackendController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
        $this->data = [];

        $n_users = User::all()->count();
        $n_roles = Role::all()->count();
        $n_perms = Permission::all()->count();
        $n_logged = Auth::user()->name;
        $n_publis = Post::published()->count();
        $n_category = Category::all()->count();
        $n_draft = Post::draft()->count();
        $n_trash = Post::onlyTrashed()->count();

        $this->data = [
            'n_users' => $n_users,
            'n_roles' => $n_roles,
            'n_perms' => $n_perms,
            'n_logged' => $n_logged,
            'n_publis' => $n_publis,
            'n_category' => $n_category,
            'n_draft' => $n_draft,
            'n_trash' => $n_trash,
        ];

        //$data = GoogleAnalytics::visitors_and_pageviews();
        //dd($data);exit;
        $analyticsData_one = Analytics::fetchTotalVisitorsAndPageViews(Period::days(14));
        $this->data['dates'] = $analyticsData_one->pluck('date');
        $this->data['visitors'] = $analyticsData_one->pluck('visitors');
        $this->data['pageViews'] = $analyticsData_one->pluck('pageViews');

        /* $analyticsData_two = Analytics::fetchVisitorsAndPageViews(Period::days(14)); */
        /* $this->data['two_dates'] = $analyticsData_two->pluck('date'); */
        /* $this->data['two_visitors'] = $analyticsData_two->pluck('visitors')->count(); */
        /* $this->data['two_pageTitle'] = $analyticsData_two->pluck('pageTitle')->count(); */
        
        /* $analyticsData_three = Analytics::fetchMostVisitedPages(Period::days(14)); */
        /* $this->data['three_url'] = $analyticsData_three->pluck('url'); */
        /* $this->data['three_pageTitle'] = $analyticsData_three->pluck('pageTitle'); */
        /* $this->data['three_pageViews'] = $analyticsData_three->pluck('pageViews'); */
        
        $this->data['browserjson'] = GoogleAnalytics::topbrowsers();

        $result = GoogleAnalytics::country();
        $this->data['country'] = $result->pluck('country');
        $this->data['country_sessions'] = $result->pluck('sessions');

        $this->data['ceci_ver'] = config('mycms.ceci_ver');
        // $this->data['title'] = trans('backpack::base.dashboard'); // set the page title

	    return view('backend.home', $this->data);
	}
}
