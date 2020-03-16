<?php

namespace App\Http\Controllers;

use App\Category;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolioes = Portfolio::with('categories')->get();
      return view('back-end.portfolio.portfolio',[
          'portfolioes' => $portfolioes
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('status',1)->get();

        return view('back-end.portfolio.add-portfolio',[
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$portfolioImage=$request->file('portfolio_image');
$imageName=$portfolioImage->getClientOriginalName();
$directory='backend/portfolio/images/';
$imagUrl=$directory.$imageName;
$portfolioImage->move($directory,$imageName);
$porortfolioes= new Portfolio();


$porortfolioes->portfolio_title=$request->portfolio_title;
$porortfolioes->portfolio_image=$imagUrl;
$porortfolioes->cat_id=$request->cat_id;
$porortfolioes->portfolio_link=$request->portfolio_link;
$porortfolioes->status=$request->status;

$porortfolioes->save();

return redirect('/portfolios')->with('message','Portfolio added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('status',1)->get();
        $portfolio=Portfolio::find($id);
//        return $categories;
        return view('back-end.portfolio.editPortfolio',[
            'portfolio'=>$portfolio,

            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $portfolios=Portfolio::find($id);

        $portfolioImage=$request->file('portfolio_image');
        if ($portfolioImage){
            if ($portfolios->portfolio_image){
                unlink($portfolios->portfolio_image);
            }
            $imageName=$portfolioImage->getClientOriginalName();
            $directory='backend/portfolio/images/';
            $imagUrl=$directory.$imageName;
            $portfolioImage->move($directory,$imageName);



            $portfolios->portfolio_title = $request->portfolio_title;
            $portfolios->portfolio_image = $imagUrl;
            $portfolios->cat_id=$request->cat_id;
            $portfolios->portfolio_link=$request->portfolio_link;
            $portfolios->status=$request->status;

            $portfolios->save();

        }else{
            $portfolios->portfolio_title = $request->portfolio_title;

            $portfolios->cat_id = $request->cat_id;
            $portfolios->portfolio_link = $request->portfolio_link;
            $portfolios->status = $request->status;

            $portfolios->save();
        }
        return redirect('/portfolios')->with('message','Portfolio Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolios=Portfolio::find($id);

        $portfolios->delete();
        return back()->with('message','Deleted  Service successfully');
    }
    public function published($id){
        $portfolios = Portfolio::find($id);

        $portfolios->status = 1;
        $portfolios->save();

        return back();

    }
    public function unpublished($id){
        $portfolios= Portfolio::find($id);

        $portfolios->status = 0;
        $portfolios->save();

        return back();

    }
}
