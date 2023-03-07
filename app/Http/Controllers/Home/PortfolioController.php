<?php

namespace App\Http\Controllers\Home;

use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    // All portfolio
    public function viewUploadedPortfolio()
    {
        $portfolio = Portfolio::all();
        return view('admin.portfolio.portfoliopage', compact('portfolio'));
    }

    public function PortfolioSetup()
    {
        $portfolio = Portfolio::all();
        return view('admin.portfolio.uploadPortfolio', compact('portfolio'));
    }

    // Setup portfolio
    public function StorePortfolio(Request $request)
    {
        $validateDate = $request->validate([
            'title' => 'required|min:3|max:25',
            'short_title' => 'required|min:3',
            'description' => 'required|min:10',
            'image' => 'required'
        ]);

        if ($request->file('image')) {
            $img = $request->file('image');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(1020, 519)->save('uploads/portfolio_images/' . $imgName);

            $saveUrl = 'uploads/portfolio_images/' . $imgName;

            Portfolio::create([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'description' => $request->description,
                'image' => $saveUrl
            ]);

            session()->flash('message', 'New Portfolio successfully created with Image');
            return redirect(route('all.portfolio'));
        }
    }


    public function EditPortfolio(Request $request)
    {

        $portfolioId = $request->id;
        $editPortfolio = Portfolio::find($portfolioId);
        return view('admin.portfolio.edit_portfolio', compact('editPortfolio'));
    }

    //Update portfolio
    public function UpdatePorfolio(Request $request)
    {
        $id = $request->id;

        $validateDate = $request->validate([
            'title' => 'required|min:3|max:25',
            'short_title' => 'required|min:3',
            'description' => 'required|min:10',
            'image' => 'required'
        ]);

        if ($request->file('image')) {
            $img = $request->file('image');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(1020, 519)->save('uploads/portfolio_images/' . $imgName);

            $saveUrl = 'uploads/portfolio_images/' . $imgName;

            Portfolio::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'description' => $request->description,
                'image' => $saveUrl
            ]);

            session()->flash('message', 'Portfolio successfully Updated');
            return redirect(route('all.portfolio'));
        }
    }

    public function DeletePortfolio($id)
    {
        $img = Portfolio::findOrFail($id);
        $image = $img->image;
        unlink($image);

        Portfolio::findOrFail($id)->delete();

        session()->flash('message', 'Portfolio successfully deleted');
        return redirect(route('all.portfolio'));
    }
}
